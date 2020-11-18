<?php
$url = parse_url(getenv("b5e5dcb1e803f4:a90bd23e@us-cdbr-east-02.cleardb.com/heroku_de162b651ed5bf0?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

print_r($conn);

print_r($url);
?>