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
	<section class="container">
		<div class="section-vakansii">
			<?php
					$vacancy = mysqli_query($connection, "select * from vacancy where isDel='false' order by id desc"); 
					if($vacancy){
						if($vacancy->num_rows>0){
							while ( $row = mysqli_fetch_array($vacancy)) {
								echo "<div class='section-vakansii-block'>
											<div class='vakansii-img-title'>
											<img src='img/logo.png' alt=''>
											<h2>".$row['post']."</h2>
										  </div>
										<div class='vakansii-text'>
											<h3>ОБЯЗАННОСТИ:</h3>
											<li>".$row['responsibility']."</li>
											<h3>ТРЕБОВАНИЯ:</h3>
											<li>".$row['requirement']."</li>
											<h3>УСЛОВИЯ:</h3>
											<li>".$row['сonditions']."</li>
										</div>
									</div>";
							}
						}
						else {
							echo "<h1 id='none-vacancy'>На данный момент вакансий нет, зайдите позже</h1>";
						}
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