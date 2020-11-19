<?php
    $Host = "us-cdbr-east-02.cleardb.com";
	$DB_User = "b5e5dcb1e803f4";
	$DB_Password = "a90bd23e";
	$DB_Name = "heroku_de162b651ed5bf0";

	$Connect = @new mysqli($Host, $DB_User, $DB_Password, $DB_Name_CG);
	$Connect->set_charset("utf-8");
	

	try{
		$dbhCG = new PDO ('mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_de162b651ed5bf0', 'b5e5dcb1e803f4', 'a90bd23e');
		$dbhCG -> query ('SET NAMES utf8');
		$dbhCG -> query ('SET CHARACTER_SET utf8_unicode_ci');
	}catch (PDOException $e){
		print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
		die();
	}
?>