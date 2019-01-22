<?php

require_once 'db_connection.php';
require_once 'config.php';

session_start();

function authorize_user($groups = NULL) {

 // Если не создан cookie-файл, проверять группы не нужно
  if ((!isset($_SESSION['user_id'])) || (!strlen($_SESSION['user_id']) > 0)) {
    header('Location: signin4.php?' .
           'error_message=You must login to see this page.');
    exit;
  }

 // Если группы не были переданы, достаточно этой авторизации
  if ((is_null($groups)) || (empty($groups))) {
    return;
  }
  
  /*
// создание строки запроса
  $query_string =
      "SELECT ug.user_id" .
      "  FROM user_groups ug, group g" .
      " WHERE g.name = '%s'" .
      "   AND g.id = ug.group_id" .
      "   AND ug.user_id = " . mysql_real_escape_string($_SESSION['user_id']);

  // Перебор всех групп и проверка принадлежности к каждой из них
  foreach ($groups as $group) {
    $query = sprintf($query_string, mysql_real_escape_string($group));

    $result = mysql_query($query);

    if (mysql_num_rows($result) == 1) {
    // Если получен результат, пользователю нужно разрешить доступ.
// Возвращение управления, чтобы продолжилось выполнение сценария.
      return;
    }
  }
*/
  // Если мы попали сюда, значит соответствий не было ни в одной из групп.
// Доступ пользователю не разрешен.
  handle_error("Вы не прошли авторизацию для просмотра данной страницы.");
  exit;
}

function user_in_group($user_id, $group) {
  $query_string =
    "SELECT ug.user_id" .
    "  FROM user_groups ug, groups g" .
    " WHERE g.name = '%s'" .
    "   AND g.id = ug.group_id" .
    "   AND ug.user_id = %d";
  $query = sprintf($query_string, mysql_real_escape_string($group), 
                                  mysql_real_escape_string($user_id));
  $result = mysql_query($query);

  if (mysql_num_rows($result) == 1) {
    return true;
  } else {
    return false;
  }
}

/*

if (isset($_POST['auth_name'])) {
  $name=mysql_real_escape_string($_POST['auth_name']);
  $pass=mysql_real_escape_string($_POST['auth_pass']);
  $query = "SELECT * FROM users WHERE name='$name' AND pass='$pass'";
  $res = mysql_query($query) or trigger_error(mysql_error().$query);
  if ($row = mysql_fetch_assoc($res)) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
  }
  header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  exit;
}
if (isset($_GET['action']) AND $_GET['action']=="logout") {
  session_start();
  session_destroy();
  header("Location: http://".$_SERVER['HTTP_HOST']."/");
  exit;
}
if (isset($_REQUEST[session_name()])) session_start();
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) return;
else {
?>
<form method="POST">
<input type="text" name="auth_name"><br>
<input type="password" name="auth_pass"><br>
<input type="submit"><br>
</form>
<? 
}
exit;
?>
*/
?>


