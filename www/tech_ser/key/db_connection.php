<?php
// require 'key/db_connection.php'
require 'config.php';



$conn = mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD)
or handle_error("возникла проблема, связанная с подключением к базе данных, " .
"содержащей нужную информацию.",
mysql_error());
mysql_set_charset('utf8',$conn);


mysql_select_db(DATABASE_NAME)
or handle_error("возникла проблема с конфигурацией нашей базы данных.",
mysql_error());

if (!mysql_connect(DATABASE_HOST,
	DATABASE_USERNAME, DATABASE_PASSWORD)) {
		$user_error_message = "возникла проблема, связанная с подключением к базе данных, содержащей нужную информацию.";
		$system_error_message = mysql_error();
		header("Location: show_error.php?error_message={$user_error_message}&system_error_message={$system_error_message}");
		exit();
}
?>