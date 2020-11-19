<?php
    $Host = "us-cdbr-east-02.cleardb.com";
	$DB_User = "b5e5dcb1e803f4";
	$DB_Password = "a90bd23e";
	$DB_Name = "heroku_de162b651ed5bf0";

	$Connect = @new mysqli($Host, $DB_User, $DB_Password, $DB_Name);
	$Connect->set_charset("utf-8");
?>