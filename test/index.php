<!DOCTYPE HTML>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ОАО "Свiтанак" - сеть магазинов города Слонима</title>
   <meta name="keywords" content="скидки, Слоним, Свитанак, магазин, акции, товары, продукты, купить, цена, сеть, город">
   <meta name="description" content="Свiтанак - сеть магазинов по всему Слониму. Продукты питания и потребительские товары.">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/animate.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
    	if(window.navigator.userAgent.indexOf('Trident/7.0')!=-1)  
	    {
	        location.replace("http://discount-svitanak.by/old_browser.html");
	    }
	    else if(window.navigator.userAgent.indexOf('Edge')!=-1)
	    {
	        location.replace("http://discount-svitanak.by/old_browser.html");
	    }

    	$(document).ready(function(){
    	var flag =true;	
        $("#btn-open-menu").click(function(){
        	//alert("Нажал");
            $("#m").slideToggle("slow");
            $(this).toggleClass("active");
            return false;
        });
    });
    </script>

   <title>Свiтанак</title>
</head>
<body>
	<?php
		require 'includes/config.php';
		require 'includes/db.php';
	?>
	<a href="#top" onclick="ScrollUp();return!1;" id="top-button"><img src="img/triangle.png" alt="triangle"></a>
	<header class="header-main grid" id="header">

		<div class="header-menu grid">
			<div class="image wow fadeIn">
				<img src="img/logo.png" style="width: 100px; z-index: 1;" alt="">
			</div>
			<div class="menu_ul wow fadeIn" >
				<ul class="menu" id="m">
				    
				    <li><a href=index.php><span>Главная</span></a></li>
				    <li><a href=http://discount-svitanak.by><span id="button-discount">Акции</span></a></li>
				    <li><a href=news.php><span>Новости</span></a></li>
		            <li><a href=akzioneram.php>Акционерам</a></li>
		            <li><a href=galery.php>Фотогалерея</a></li>
		            <li><a href=vakansii.php>Вакансии</a></li>
				    </li>
				    <li><a href="contacts.php"><span>Контакты</span></a></li>
				</ul>
				
			</div>
			<button id="btn-open-menu">Меню</button>
			

		</div>
		<div class="header-content grid">
			<div class="img-main wow fadeIn" style="justify-content: center;

display: grid;">
				<img src="img/logo.png" alt="">
			</div>
			<div class="text-main wow fadeIn">
				<h1>Слонимское торговое ОАО "Свiтанак" <br>- сеть магазинов города Слонима</h1>
			</div>
			
			<div class="button_down wow fadeIn" id="button_down">
				<a href="#action"><img src="img/page-down.png" alt=""></a>
			</div>
		</div>

	</header>


	<section class="action" id="action" style="background-image: url(img/action_back.jpg);">
	    <div class="action-title wow fadeIn">
	    <h1>Акции<br><span style="border-bottom: 3px solid yellow;">свежие поступления</span></h1>
	    </div>
	    <div class="action-blocks wow fadeIn">
		<div class="action-block">
		    <img src="img/lupa.png" alt="">
		    <div class="action-block-title">
		    <h3>Информация о самых выгодных предложениях</h2>
		    </div>
		</div>
        <div class="action-block">
            <img src="img/discount.png" alt="">
            <div class="action-block-title">
            <h3>Акции и новые поступления</h2>
            </div>
        </div>
        <div class="action-block">
            <img src="img/store.png" alt="">
            <div class="action-block-title">
            <h3>Обзор акций по определенному магазину</h2>
            </div>
        </div>
		</div>
		<div class="action-button wow fadeIn">
            <a href="http://discount-svitanak.by">перейти</a>
        </div>
	</section>	

	<section class="news" id="news" style="background-image: url(img/news.jpg);">
		<div class="news_title wow fadeIn">
			<h1>Новости <br>
			коротко о главном</h1>

		</div>
		<div class="news_blocks wow fadeIn">
			<?php
				$articles = mysqli_query($connection, "select * from articles where categorie = 'true' and isDel='false' order by id desc limit 4"); 
			?>
			<?php
				while ( $row = mysqli_fetch_assoc($articles)) {
					# code...
					/*$text = $row['text'];
					while(stristr($text,"<img")){
					    $first = stristr ($text,"<img");
					    $text = substr_replace($text,"",$first);
					}*/
					$photos = mysqli_query($connection, "select * from photo_news_articles where id_news_articles =". $row['id'] ." order by id ASC limit 1");
					if($photos->num_rows>0){
					    $photo = mysqli_fetch_assoc($photos);
					    $photo = $config['constants']['path_img'].$photo['link'];
					}
					else{
					    $photo =$config['constants']['path_img'].$config['constants']['img_nophoto_news'];
					}
				
			?>
				<div class="in_block">
					<div class="in_block_image">
						<?php
							echo "<img src='$photo' alt=''>";
						?>
					</div>
					<div class="in_block_content">
						<div class="in_block_text">
							<h3><p><?php
							echo $row['title'] ;
							?></p></h3>
							<p><?php
								echo mb_substr($row['text'], 0, 280, 'utf-8')."..." ;
							?></p>
						</div>
						<div class="in_block_button">
							<?php
								echo "<a href='news.php?id=".$row['id']."'> подробнее</a>" ;
							?>
						</div>

					</div>
				</div>
			<?php
				}
			?>
		</div>
	</section>

	
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