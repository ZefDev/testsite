<!DOCTYPE HTML>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/animate.css">
 
    <link href="css/fotorama.css" rel="stylesheet">
   
    
	<script src="js/mainscript.js"></script>


   <title>Свiтанак</title>
</head>
<body>
	<?php
		require 'includes/config.php';
		require 'includes/header.php';
		require 'includes/pager.php';
		require 'includes/workingWithBase.php';
		require_once 'includes/db.php';
	?>
	<section class="container">
		<div class="main-section-galery">
		<div class="section-galery" id="section_gallery" data-nav="thumbs" data-width="60%" data-cropToFit="true">
			<?php $result = mysqli_query($connection, "select * from gallery order by id desc ") or die("Ошибка " . mysqli_error($connection)); 
		
		        if($result){
    				while ( $rowPhoto = mysqli_fetch_array($result)) {
    					echo "<img src='".$config['constants']['path_img'].$rowPhoto['link']."'>";
    	    		}
	        	}
	        ?>
		</div>
		<div id="pager_gallery" class="galery-pages">
			<?php /*
				$page = 1;
				if(isset($_REQUEST['page'])){
					$page = (int)$_REQUEST['page'];
				}
				$pager = new pager($connection,"gallery",$config['constants']['per_page_gallery'],$page);
				echo $pager->getPageContainer();
				<?php
			    
				//echo refresh_gallery($connection,$config,true);
			
				
				*/
			?>
		</div>
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
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.2/fotorama.js"></script>
<script>

      $(function () {
      $('#section_gallery').fotorama();
      });
  
    </script>
	<!-- ВСЁ ЧТО КОСАЕТСЯ ВЫПАДАЮЩИХ МАГАЗОВ-->

	



</body>
</html>