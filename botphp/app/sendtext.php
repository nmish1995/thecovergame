<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://chatapi.viber.com/pa/send_message",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n    \"receiver\": \"90hZoSPZZDHF2rfnEozFbQ==\",\r\n    \"min_api_version\": 1,\r\n    \"sender\": {\r\n        \"name\": \"John McClane\",\r\n        \"avatar\": \"http://avatar.example.com\"\r\n    },\r\n    \"tracking_data\": \"tracking data\",\r\n    \"type\": \"text\",\r\n    \"text\": \"hello\"\r\n}",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: e66f5e5c-decc-f2ea-69d3-882ec6a7bdb1",
        "x-viber-auth-token: 4598646108f1bcc7-43ec472796de914c-bf9cf2be56d45a4a"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}