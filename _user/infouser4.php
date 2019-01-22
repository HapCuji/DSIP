<?php
// Код присваивания значений переменным страницы
require 'key/db_connection.php';
require 'key/authorize4.php';
require 'key/viewNomy3.php';
header("Content-Type: text/html; charset=utf-8");

session_start();
// Authorize any user, as long as they're logged in
//authorize_user();


// Get the user ID of the user to show
$user_id = $_REQUEST['user_id'];  ///metod post
if (!isset($user_id)) {
  $user_id = $_SESSION['user_id'];
} else{
	if (isset($_SESSION['user_id'])) {
		$nickname = $_SESSION["name"];
		$user_id_session = $_SESSION['user_id'];
		$select_query = "SELECT * FROM users1 WHERE user_id = " . $user_id_session;
		// Запуск запроса
		$result = mysql_query($select_query);

		if ($result) {
			$row = mysql_fetch_array($result);
			//$image_id_session = $row['imageuser_id'];
			$group_user_id_session = $row['usergroup_id'];
		};
	}
}

$select_query = "SELECT * FROM users1 WHERE user_id = " . $user_id;
// Запуск запроса
$result = mysql_query($select_query);

if ($result) {
	$row = mysql_fetch_array($result);
	$name = $row['name'];
	$for_name = $row['for_name'];
	$bio =  $row['bio'];
	$email = $row['email'];
	$facebook_url = $row['facebook'];
	$password = $row['password'];
	$image_id = $row['imageuser_id'];
	$group_user_id = $row['usergroup_id'];
} else {
  handle_error("there was a problem finding your information in our system.",
               "Error locating user with ID {$user_id}");
}

//page_start("Профиль");
?>

<html>
<head>

<link href="css/title1.css" rel="stylesheet" type="text/css" />


 <title>Увлажнитель воздуха</title>

 </head>
 <body>
  <div id="header"><h1>Увлажнитель воздуха</h1></div>

  <div id="sidebar">
     <p><a href="title2.php">Главная</a></p>
    <p><a href="oWir1.php">О нас</a></p>
<!--
    <p><a href="porodukt.php.">Виды услуг</a></p>
	 <p><a href="vektor.php">Как найти</a></p>
-->
	<p><a href='signout4.php'>Exit my</a></p>
	 <p><a href="infouser4.php">Личный кабинет</a></p>
  </div>

    <h2> </h2>
    <p>
<div id="example"> <h1> Профиль пользователя</h1> </div>
<div id="content_user">
	<div class="user_profile">
		<h3><?php echo "{$name}  {$for_name}"; ?></h3>
		<p>
			<?php
			if (!empty($image_id) && !($image_id == 0)) {
			echo '<img src="show_image.php?images_id='. $image_id.'" class="user_pic" />';
			} else{
			echo '<img src="image/profile_pics/xxx.jpg" class="user_pic" /> ';
			}
			?>
			<?php echo $bio; ?>
			 <?php 
			 if ($group_user_id_session != 1 or $user_id == $_SESSION['user_id']){
				 if ( $group_user_id == 1) { // if ($_SESSION['name'] == goodProfi) { 
						echo '<h3> Вы зашли как администратор! </h3>
							<p title="Информация о пользователях"><a href="show_user4.php">Контролируйте пользователей! </a></p>
							<p title="Информация о техпроцессе"><a href="show_tp1.php">Контролируйте техпроцесс! </a></p>';
					} else{
						if ( $group_user_id == 2) { // if ($_SESSION['name'] == goodProfi) { 
							echo '<h2> Вы зашли как Технолог! </h2>
								<p title="Информация о техпроцессе"><a href="show_tp1.php">Контролируйте техпроцесс! </a></p>';
						}
					}	
				}
			 ?>
		</p>
		<p class="contact_info">
		Поддерживайте связь с <?php echo $name; ?>:
		</p>
		<ul>
			<li>...по
			<a href="mailto:<?php echo $email; ?>"> электронной почте</a></li>
			<li>...или путем
			<a href="https://ru-ru.facebook.com/<?php echo $facebook_url; ?>">посещения его страницы
			на Facebook</a></li>
		</ul>
		<?php
		if ($user_id == $_SESSION['user_id']){
			echo '<div class='.shedevr.'> 
				<li type=1> 	Ваш ник - '.$name.' <br> 
								Ваше имя - '.$for_name.'<br>
								<a href="mailto:'.$email.'"> Ваш Email: '.$email.'</a> 
								<a href="https://ru-ru.facebook.com/'.$facebook_url.'">	Ваша страница Facebook</a><br>
								<a href="delete_user.php?user_id='.$_SESSION['user_id'].'">
								<img class=delete_user src="image/delete.png" width=15 />
								Delet my page</a>
					</li>
				<li type=1> <a href="update_user.php?user_id='.$_SESSION['user_id'].'">
							<img class=delete_user src="image/update.png" width=15 />
							Изменить профиль</a>
					</li>
			 </div>';
		} else {
			if ( $group_user_id_session == 1) { // if ($_SESSION['name'] == goodProfi) { 
					
					echo '
					<h3> Вы зашли как администратор! </h3>
					<div class='.shedevr.'> 
					<li type=1> 	ник - '.$name.' <br> 
									имя - '.$for_name.'<br>
									<a href="mailto:'.$email.'"> Email: '.$email.'</a> 
									<a href="https://ru-ru.facebook.com/'.$facebook_url.'">	 страница Facebook</a><br>
									<a href="delete_user.php?user_id='.$user_id.'">
									<img class=delete_user src="image/delete.png" width=15 />
									Delet page - '.$name.' </a>
						</li>
					<li type=1> <a href="update_user.php?user_id='.$user_id.'">
								<img class=delete_user src="image/update.png" width=15 />
								Изменить профиль для - '.$name.'</a>
						</li>
						<p title="Информация о пользователях"><a href="show_user4.php">Контролируйте пользователей! </a></p>
						<p title="Информация о техпроцессе"><a href="show_tp1.php">Контролируйте техпроцесс! </a></p>
				 </div>';
				}
		}

		?>
	</div>
  </div>

  <div id="footer">Сервис 2018 год. Мастерская изготовления.</div>
 </body>
</html>



