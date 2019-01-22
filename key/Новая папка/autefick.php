<?php
require_once 'db_connection.php';
if (!isset($_SERVER['PHP_AUTH_USER']) ||
!isset($_SERVER['PHP_AUTH_PW'])) {
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="The Social Site"');
//header("Location: ".SITE_ROOT."registration1.php");
exit("Здесь нужно указать верное имя пользователя и пароль." .
"Проходите дальше. Здесь вам нечего смотреть.");
}
// Поиск предоставленных пользователем полномочий
 $query = sprintf("SELECT user_id, name FROM users1 WHERE name = '%s' AND password = '%s';",
mysql_real_escape_string(trim($_SERVER['PHP_AUTH_USER'])),
mysql_real_escape_string(crypt(trim($_SERVER['PHP_AUTH_PW']),$_SERVER['PHP_AUTH_USER'])));
$results = mysql_query($query);

if ($results) {
$result = mysql_fetch_array($results);
$current_user_id = $result['user_id'];
$current_username = $result['name'];
//$nash_ok = true;
} else {
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="The Social Site"');
//header("Location: ".SITE_ROOT."infouser2.php");
exit("Здесь нужно указать верное имя пользователя и пароль. Проходите дальше. Здесь вам нечего смотреть.");
}
?>