<?php
header("Content-Type: text/html; charset=utf-8");
require_once 'key/db_connection.php';
session_start();

if (isset($_SESSION['user_id'])) {
		$nickname = $_SESSION["name"];
		$user_id = $_SESSION['user_id'];
		$select_query = "SELECT * FROM users1 WHERE user_id = " . $user_id;
		// Запуск запроса
		$result = mysql_query($select_query);

		if ($result) {
			$row = mysql_fetch_array($result);
			$image_id = $row['imageuser_id'];
			$group_user_id = $row['usergroup_id'];
		};
}
?>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/title1.css">
  
  <title>Увлажнитель воздуха</title>

 </head>
 <body>
  <div class="block">

  <div id="sidebar">
    <p><a href="title2.php">Главная</a></p>
	 <p><a href='look_on_order1.php'>Заказы</a></p>
	<p><a href="show_tp1.php">Технологический процесс</a></p>
	    <p><a href="oWir1.php">О нас</a></p>
	 
<?php
	if (isset($_SESSION['user_id'])) { //$_SESSION['user_id']
		
		if ( $group_user_id == 1) { // $_SESSION['group_id'] = 1 //<p><a href="key/cryptreload.php">Узнать пароль</a></p>
			echo <<<EOD
			<p><a href="_user/show_user4.php">Управление пользователями</a></p>	
EOD;
		}
		echo <<<EOD
		<p><a href='signout4.php'>Exit my</a></p>
		<p><a href="infouser4.php">Личный кабинет {$nickname} </a></p>
		<p><a href="fpdf1.php">Отчет PDF</a></p>
EOD;
		
	} else{
	 	echo <<<EOD
	<p><a href='signup4.php'>Регистрация</a></p>
	 <p><a href="infouser4.php">Личный кабинет</a></p>
	<p><a href="fpdf1.php">Отчет PDF</a></p>
EOD;
	 }
	 ?>
	
  </div>
  <div id="content">
  
    <h2>Узнаём:"Что такое Увлажнитель воздуха?" </h2>
	<div class="oplat"> 
	<ul>
	<li>
    <p>Наша история тянется ещё с военных сборов, когда весь день шел дождь.
	</p>
	</li>
	<li>
    <p>..и совсем, кажется, недавно we началi собирать свой ээ.. "Увлажнитель воздуха".</p></br>
<p>Сегодня она стал такой.	
	<img src="image/scrin/1-410-2.jpg" class="history_pic" />
	<div class="video">
	</li>
	<li>
	<p>Наш любимый мультик.<br\>
	<video width="400" height="300" controls="controls" poster="image/ok.png">
   <source src="image/tovar/Nu.Pogodi.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
   Тег video не поддерживается вашим браузером. 
   <a href="image/tovar/Nu.Pogodi.mp4">Скачайте видео</a>.
  </video>
  </li>
  </ul>
</p> </div>

   </div>
     <div id="footer">Сервис 2018 год. Мастерская изготовления.</div>
  </div>
     
  </div>

 </body>
</html>