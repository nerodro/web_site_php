<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="shortcut icon" href="../style/img/sherst.png" type="image/png">
</head>
<body>
	<general>
		<div id = "header" class="general" role = "banner">
			<div class="pic">
			<a href="../index.php"><img src="../style/img/cool.jpg" width="1280" height="280" ></a>
		</div>
		<div class="texti">
			<h1>Убежище Программиста</h1>
			<h3>Вся информация о программировании</h3>
		</div>
		<ul class="menu-item">
			<li class="menu-item">
				<a href="../index.php">Главная</a>
			</li>
			<li class="menu-item">
				<a href="../general.php">Основы</a>
			</li>
			<li class="menu-item">
				<a href="../soviet.php">Советы</a>
			</li>
			<li class="menu-item">
				<a href="../books.php">Книги</a>
			</li>
			<li class="menu-item">
				<a href="../blog.php">Статьи</a>
			</li>
		</ul>
		</div>
	</general>
	<visual>
		<div class="block">
			<?php
	   		$connect = new PDO("mysql:host=mysql.zzz.com.ua; dbname=nerodro; charset=utf8", $username='nerodro',$password='Nerodro24');
	   		
	   		$title = ['title'];
	   		$short = ['shotText'];
	   		$content = ['content'];
	   		$date = date($format='Y-m-d H:i:s');
	   		$query = $connect->query($statement= "INSERT INTO nerodro.posts (title,shortText,content, date) VALUES('$title','$shortText','$content', '$date')");
	   		?>
	   		<?php
	   		$connect = new PDO("mysql:host=mysql.zzz.com.ua; dbname=nerodro; charset=utf8", $username='nerodro',$password='Nerodro24');
	   		if (nerodro['username'] != NULL) {
   			$username = $_POST['username'];
   			$comment = $_POST['comment'];
   			$date = date($format='Y-m-d H:i:s');
   			$query = $connect->query($statement= "INSERT INTO nerodro.compsince (username, comment, date) VALUES('$username','$comment', '$date')");
   		}
	   		?>
	   		<div class="zalog">
			<hr>
			</div>
			<div class="content">
				<?php
				$post = $connect->query($statement="SELECT * FROM nerodro.posts WHERE `id` = 24");
				$post = $post->fetchALL($fetch_style = PDO::FETCH_ASSOC); 
				if ($post){	
   			foreach ($post as $content ) {
   			?>
   			<div class="row">
  <div class="span8">
    <div class="row">
      <div class="span8">
        <h4><strong><?php echo "{$content['title']}"?></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="span2">
      </div>
      <div class="span6">      
        <p>
          <?php echo "{$content['content']}"?>
        </p>
        <p><a class="btn" href="../blog.php" style="color: grey">Вернутся назад</a></p>
          <hr>
			</div>
		</div>
			<?php }}?>
			<div class="comentt">
				<b>Оставить комментарий</b>
				<form name="forum" method="POST" id="dyn">
			<div class="hoverr">
			  <p>Ваше имя:<br></p>
   			<input type="text" size="40" name="username" minlength="4" maxlength="8" required />
   			<p>Сообщение</br>
   			<textarea name="comment" cols="40" rows="3" maxlength="100" required></textarea></p>
   			  <input class="btn" type="submit" value="Отправить"/>
   			</form>
   			<?php
   			$compsince = $connect->query($statement="SELECT * FROM nerodro.compsince ORDER BY date DESC");
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
	</visual>
</body>
</html>
