<?php
//require_once 'key/config.php';
require_once 'key/db_connection.php';
require_once 'key/authorize4.php';
// Получение идентификатора удаляемого пользователя
$comm_date = $_REQUEST['comm_date'];
// Создание инструкции DELETE
$delete_query = sprintf('DELETE FROM comments WHERE comm_date = "%s"',
mysql_real_escape_string($comm_date));
// Удаление пользователя из базы данных
mysql_query($delete_query) or die("vse ploho");
// Перенаправление на show_users для повторного показа пользователей
// (без удаленного пользователя)
$msg = "The user you specified has been deleted!";
header("Location: title2.php");
exit();
?>