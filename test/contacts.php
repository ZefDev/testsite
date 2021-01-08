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
	<section class="contacts-main">
			<div class="text-contact">
				<h2>АДРЕС</h2>
				<li>г.Слоним, ул. Красноармейская 4</li>
				<h2>ВРЕМЯ РАБОТЫ</h2>
				<li>Пн-Чт: 8:00-17:00</li>
				<li>Пт: 8:00-16:00</li>
				<li>Обед: 13:00-13:42</li>
				<li>Сб-Вс: выходной</li>
				<h2>ТЕЛЕФОНЫ</h2>
				<li>Директор: 6-69-77</li>
				<li>Синяк Елена Михайловна</li>
				<li>Приемная: 6-69-79</li>
				<li>Председатель НС: 6-69-98</li>
				<li>Начальник торгового отдела: 6-69-98</li>
				<li>Отдел кадров: 6-69-86</li>
				<li>Бухгалтерия: 6-69-84</li>
				<h2>АДРЕС ЭЛЕКТРОННОЙ <br>ПОЧТЫ</h2>
				<li>svitanak@mail.grodno.by</li>
				<h2>РЕКВИЗИТЫ</h2>
				<p>Регистрационный номер УНН 500041006</p>
			</div>
			<div class="map-contact">
				<iframe src="https://www.google.com/maps/d/embed?mid=1HLGCKAohA8EOJ-YAnrWJDc4nAY9zDLcp" width="580px" height="600px"></iframe>
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