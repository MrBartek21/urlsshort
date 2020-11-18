<?php
$url = parse_url(getenv("mysql://b5e5dcb1e803f4:a90bd23e@us-cdbr-east-02.cleardb.com/heroku_de162b651ed5bf0?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

print_r($conn);

print_r($url);



try{
		$dbhCG = new PDO ('mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_de162b651ed5bf0', 'b5e5dcb1e803f4', 'a90bd23e');
		$dbhCG -> query ('SET NAMES utf8');
		$dbhCG -> query ('SET CHARACTER_SET utf8_unicode_ci');
	}catch (PDOException $e){
		print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
		die();
	}
?>