'use strict';

const ViberBot  = require('viber-bot').Bot;
const BotEvents = require('viber-bot').Events;
const fs = require('fs');
const TextMessage = require('viber-bot').Message.Text;
const bot    = new ViberBot({
    authToken: "4598646108f1bcc7-43ec472796de914c-bf9cf2be56d45a4a",
    name: "EchoBot",
    avatar: "http://viber.com/avatar.jpg" // It is recommended to be 720x720, and no more than 100kb.
});

// Perfect! Now here's the key part:
bot.on(BotEvents.MESSAGE_RECEIVED, (message, response) => {
    // Echo's back the message to the client. Your bot logic should sit here.
    bot.onTextMessage(/^hi|hello$/i, (message, response) =>
response.send(new TextMessage(`Hi there ${response.userProfile.name}. I am ${bot.name}`)));

});

// Wasn't that easy? Let's create HTTPS server and set the webhook:
const https = require('https');
const port  = process.env.PORT || 8085;

// Viber will push messages sent to this URL. Web server should be internet-facing.
const webhookUrl = process.env.WEBHOOK_URL;

const httpsOptions = {key: fs.readFileSync('certificate.key').toString(), cert: fs.readFileSync('certificate.crt').toString(), ca: fs.readFileSync('cert.pem').toString()};
https.createServer(httpsOptions, bot.middleware()).listen(port, () => bot.setWebhook(webhookUrl));