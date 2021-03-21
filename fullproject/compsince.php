<!DOCTYPE html>
<html>
<head>
	<title>My programming</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="shortcut icon" href="style/img/sherst.png" type="image/png">
</head>
<body>
	<general>
		<div id = "header" class="general" role = "banner">
			<div class="pic">
			<a href="index.php"><img src="style/img/cool.jpg" width="1280" height="280" ></a>
		</div>
		<div class="pt17">
			<h1>Убежище Программиста</h1>
			<h3>Вся информация о программировании</h3>
		</div>
		<ul class="menu-item">
			<li class="menu-item">
				<a href="index.php">Главная</a>
			</li>
			<li class="menu-item">
				<a href="general.php">Основы</a>
			</li>
			<li class="menu-item">
				<a href="soviet.php">Советы</a>
			</li>
			<li class="menu-item">
				<a href="books.php">Книги</a>
			</li>
			<li class="menu-item">
				<a href="forum.php">Форум</a>
			</li>
		</ul>
		</div>
	</general>
	<visual>
		<?php
   		$connect = new PDO($dns = "mysql:host=localhost; dbname=forum; charset=utf8", $username='root',$password='');
   			if(isset($_POST['username'])){
   			$username = $_POST['username'];
   			$comment = $_POST['comment'];
   			$date = date($format='Y-m-d H:i:s');
   			$query = $connect->query($statement= "INSERT INTO forum.compsince (username, comment, date) VALUES('$username','$comment', '$date')");
   		}
   		?>
		<div class="block">
			<div class="pt18">
				Добро пожаловать в раздел посвященный Computer Sciense 
			<form name="forum" method="POST" id="dyn">
			<div class="hoverr">
			  <p><b>Ваше имя:</b><br></p>
   			<input type="text" size="40" name="username" required />
   			<p>Сообщение</br>
   			<textarea name="comment" cols="40" rows="3" required></textarea></p>
   			  <input class="btn" type="submit" value="Отправить"/>
   			</form>
   			<?php
   			$compsince = $connect->query($statement="SELECT * FROM forum.compsince ORDER BY date DESC");
   			$compsince = $compsince->fetchALL($fetch_style = PDO ==FETCH_ASSOC);
   			
   			if ($compsince){
   			foreach ($compsince as $comment ) {
   			?>
   			<p><?php echo "{$comment['date']} {$comment['username']} написал {$comment['comment']}"?></p>
   			<?php }}  else{?>
   				<p>Здесь пока нет сообщений</p>
   			<?php }?>
   		</div>
   		</div>
   	</div>


</visual>
</body>
</html>