<!DOCTYPE HTML>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/animate.css">

   <title>Свiтанак</title>
</head>
<body>
	
	<?php
		require 'includes/header.php';
	?>
	<div class="container">
	<section class="news-main" id="news_main">
		<div class="sidebar-news"  id ="sidebar_news">
				<h2>АРХИВ НОВОСТЕЙ</h2>
					<?php
					$articles = mysqli_query($connection, "select * from articles where categorie = 'true' and isDel='false' order by id desc") or die(mysqli_error($connection)); 
					$id = 0;
					if(isset($_REQUEST['id'])){
						$id = (int)$_REQUEST['id'];
					}
					while ( $row = mysqli_fetch_array($articles)) {
						if($id == (int)$row['id']){
							echo "<li><a href='news.php?id=".$row['id']."' style='color: #f6d014;'>".$row['title']."(".$row['pubdate'].")</a></li>";
						}
						else if($id == 0) {
							echo "<li><a href='news.php?id=".$row['id']."' style='color: #f6d014;'>".$row['title']."(".$row['pubdate'].")</a></li>";
							$id = $row['id'];
						}
						else {
							echo "<li><a href='news.php?id=".$row['id']."'>".$row['title']."(".$row['pubdate'].")</a></li>";
						}
					}
				?>
			</div>
			<div class="content-news" id ="content_news">
				<?php 
					$res_count = mysqli_query($connection,"select count(*) as count from articles where categorie = 'true' and isDel='false' order by id desc limit 1");
				    $res_count = mysqli_fetch_assoc($res_count);
				    $count = $res_count['count'];
				    if($count==0){
				        echo "<script>
				                document.getElementById('content_news').style.visibility = 'hidden';
				                 document.getElementById('sidebar_news').style.visibility = 'hidden';
				                 document.getElementById('news_main').innerHTML='<h1 id=none_news>На данный момент новостей нет!</h1>';
				            </script>";
				    }
					if(isset($_REQUEST['id'])){
						$id = (int)$_REQUEST['id'];
					}
					if($id == 0){
						$articles = mysqli_query($connection, "select * from articles where categorie = 'true' and isDel='false' order	by id desc limit 1")or die(mysqli_error($connection)); 
					}
					else {
						$articles = mysqli_query($connection, "select * from articles where id = $id and categorie = 'true' and isDel='false' order by id desc")or die(mysqli_error($connection)); 
					}
					if($articles){
						while ( $row = mysqli_fetch_assoc($articles)) {
							echo "<h1>".$row['title']."(".$row['pubdate'].")</h1>";
							echo "<p>".$row['text']."</p>";
							$id = $row['id'];
						}
						/*$photo_news_articles = mysqli_query($connection, "select * from photo_news_articles where id_news_articles = $id order by id desc")or die(mysqli_error($connection)); 
						if($photo_news_articles){
							while ( $rowPhoto = mysqli_fetch_array($photo_news_articles)) {
							echo "<img src='".$config['constants']['path_img'].$rowPhoto['link']."'>";
							}
						}*/
					}
				?>
			</div>
	</section>
	</div>
	<?php
		require 'includes/footer.php';
	?>


	<script>
		function ScrollUp(){
		    var t,s;
		    s=document.body.scrollTop||window.pageYOffset;
		    t=setInterval(function(){if(s>0)window.scroll(0,s-=50);else clearInterval(t)},5);
		}
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/common-scripts.js">
    </script>

	<script>
	  new WOW().init();
	</script>

	<!-- ВСЁ ЧТО КОСАЕТСЯ ВЫПАДАЮЩИХ МАГАЗОВ-->

	



</body>
</html>