<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<html>
 <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/title1.css">
  
  <title>Увлажнитель воздуха</title>

 </head>
 <body>
  <div class="block">
  <div id="header"><h1>Увлажнитель воздуха</h1></div>
  <?
  //<div id="userconnect"></div>
  ?>
  <div id="sidebar">
    <p><a href="title2.php">Главная</a></p>
    <p><a href="oWir1.php">О нас</a></p>
    <p><a href="porodukt.php.">Виды услуг</a></p>
	 <p><a href="vektor.php">Как найти</a></p>
<?php
	 if (isset($_SESSION['user_id'])) {
	echo <<<EOD
	<p><a href='signout4.php'>Exit my</a></p>
	 <p><a href="infouser4.php">Личный кабинет</a></p>
EOD;
	 } else{
	 	echo <<<EOD
	<p><a href='signup4.php'>Регистрация</a></p>
	 <p><a href="infouser4.php">Личный кабинет</a></p>
EOD;
	 }
	 ?>
	
   
  </div>
  <div id="content">
    <h3>Вот что мы можем сделать </h3>
	<h3>Шедевры нашей работы </h3>
    <div class="shedevr">
	<ul>
	<li><p>Собрано из BMW 750I V12 Кузов e38 и фрагментов Волги ГАЗ 21 второй выпуск.<br\><img src="image/tovar/shed1.jpg" class="tovar" />
	<img src="image/tovar/shed11.jpg" class="tovar" />
	<img src="image/tovar/shed111.jpg" class="tovar" />
	</p></li></br>
		<li><p>А вот вариант отличного тюнинга, соответствующего внутреностям машины
	</p>
	<img src="image/tovar/shed2.jpg" class="tovar" /></li>
	</ul>
 <h3>Также мы умеем отлично красить машины. Обычно иномарки </h3>
 <ul>
	<li><p>Так</p><img src="image/blueBMW.jpg" class="tovar" />
	</li></br>
		<li><p>И так</p><img src="image/carblue1.jpg" class="tovar" />
		</li></br>
		<li><p>Ну.. или так</p><img src="image/car2.jpg" class="tovar" />
		</li>
	</ul>
	</div>
   <div class="oplat"> 
  
   <h3>Делаем любую работу чисто "символической" платой</h3>
   <ul type='disk'>
   <li>Пивом <img src="image/tovar/pivo1.jpg" class="tovar" /></li>
   <li>Харизмой<img src="image/tovar/harizma.jpg" class="tovar" /></li>
   <li>Деньгами<img src="image/tovar/many.jpg" class="tovar" /></li>
   </ul>
   </div>
      
  </div>
  </div>
  <div id="footer">Сервис 2018 год. Мастерская изготовления.</div>
 </body>
</html>