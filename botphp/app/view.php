<?php
$text = file_get_contents("90hZoSPZZDHF2rfnEozFbQ==.txt");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<textarea name="" id="" cols="40" rows="25"><?php echo $text ?></textarea>
<form method="post" action="sendtext.php">
    <input type="text" style="width:400px;" name="newtext">
    <input type="submit">
</form>


</body>
</html>
