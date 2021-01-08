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
		require 'includes/config.php';
	?>
	<?php
		require 'includes/header.php';
	?>	
	<div class="container">
	<section class="akzioneram-doc">
		<div class="section-doc">
			<?php

                $result = mysqli_query($connection, "select * from normative_document order by id desc limit 8")or die(mysqli_error($connection)); 
                    if($result){
                        $num=0;
                        while($row = mysqli_fetch_array($result)){
                            $num++;
                            echo "<a href='".$config['constants']['path_doc'].$row['link']."' download>
        								<div class='section-doc-block'>
        									<div class='blockh3'>
        										<h3>".$row['link']."</h3>
        									</div>
        								</div>
        							</a>";
                        }
                    }
			/*$dir = "documents/";
			$dh  = opendir($dir);
			$num =0;
			if (is_dir($dir)){
				while (false !== ($filename = readdir($dh))) {
					if($filename!="." & $filename!=".."){
						$num++;
						echo "<a href='".$config['constants']['path_doc'].$filename."' download>
								<div class='section-doc-block'>
									<div class='blockh3'>
										<h3>Нормативный документ ".$num."</h3>
									</div>
								</div>
							</a>";
					}
				    //$files[] = $filename;
				}
			}*/
			?>
		</div>
	</section>
	<section class="news-main container" style="background: none;" id="news_main">
		<div class="sidebar-news"  id ="sidebar_news">
				<h2>АРХИВ НОВОСТЕЙ</h2>
				<?php
					$id = 0;
					if(isset($_REQUEST['id'])){
						$id = (int)$_REQUEST['id'];
					}
					$news_shareholder = mysqli_query($connection, "select * from articles where categorie = 'false' and isDel='false' order by id desc")or die(mysqli_error($connection));  

					while ( $row = mysqli_fetch_array($news_shareholder)) {
						if($id == (int)$row['id']){
							echo "<li><a href='akzioneram.php?id=".$row['id']."' style='color: #f6d014;'>".$row['title']."(".$row['pubDate'].")</a></li>";
						}
						else if($id == 0) {
							echo "<li><a href='akzioneram.php?id=".$row['id']."' style='color: #f6d014;' >".$row['title']."(".$row['pubDate'].")</a></li>";
							$id = $row['id'];
						}
						else {
							echo "<li><a href='akzioneram.php?id=".$row['id']."' >".$row['title']."(".$row['pubDate'].")</a></li>";
						}
					}
				?>
			</div>

			<div class="content-news" id ="content_news">
				<?php 
				    $res_count = mysqli_query($connection,"select count(*) as count from articles where categorie = 'false' and isDel='false' order by id desc limit 1");
				    $res_count = mysqli_fetch_assoc($res_count);
				    $count = $res_count['count'];
				    if($count==0){
				        echo "<script>
				                document.getElementById('content_news').style.visibility = 'hidden';
				                 document.getElementById('sidebar_news').style.visibility = 'hidden';
				                 document.getElementById('news_main').innerHTML='<h1 id=none_news>На данный момент информации для акционеров нет!</h1>';
				            </script>";
				    }
				    $id = 0;
					if(isset($_REQUEST['id'])){
						$id = (int)$_REQUEST['id'];
					}
					if($id == 0){
						$news_shareholder = mysqli_query($connection, "select * from articles where categorie = 'false' and isDel='false' order by id desc limit 1")or die(mysqli_error($connection)); 
					}
					else {
						$news_shareholder = mysqli_query($connection, "select * from articles where id = $id and categorie = 'false' and isDel='false' order by id desc")or die(mysqli_error($connection)); 
					}
					if($news_shareholder){
						while ( $row = mysqli_fetch_assoc($news_shareholder)) {
							echo "<h1>".$row['title']."(".$row['pubDate'].")</h1>";
							echo "<p>".$row['text']."</p>";
							$id = $row['id'];
						}
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