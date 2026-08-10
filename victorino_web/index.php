<!DOCTYPE html>
<html>


	<head>
		<link rel="stylesheet" href="style.css">

		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<title>Victorino Artesanal</title>

		<link rel="icon" type="image/images.jpeg" href="images/favicon.png">


		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

		
		<!-- FONT ICONS -->
		<link rel="stylesheet" href="fonts/icons-linear.css">
		<link rel="stylesheet" href="fonts/icons-fontawesome/css/all.min.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="styleresponsive.css">


		<script src="js/jquery.js"></script>
		<script src="js/scripts.js"></script>
		<script src="contactform/contactform.js"></script>
		<script src="js/menuscript.js"></script>
	</head>

	<body id="home">

		<header>
			 
			<div class="container psr">

				<div class="header_default">

                  <div class="site-branding">
                    <a href="index.html" class="logo">
                    VICTORINO ARTESANAL
                   </a>
                   </div>

					<div class="header-right">


						<div class="site-navwrap">
							<div class="navicons">
		                		<a href="javascript:void;" class="navshow">
		                			<span class="lnr lnr-menu"></span>
		                		</a>
		                		<a href="javascript:void;" class="navhide">
		                			<span class="lnr lnr-cross"></span>
		                		</a>
		            		</div>
	      
		            		<div class="sitenav" id="sitenav">
		            			<div class="navwrap">
									<div class="navouter">


										<nav class="headermenu leftmenu" id="headnav" role="navigation">
											<ul>
												<li class="active"><a href="#home">Inicio</a></li>
												<li><a href="#about">Nosotros</a></li>
												<li><a href="menu.php">Menu</a></li>
												<li ><a href="#contact">reservas</a></li>
											</ul>
										</nav>


									</div>
								</div>
				            </div>
				            <!--sitenav-->
						</div>
						<!--site-navwrap-->	

						<div class="contact-info">
							<a href="tel:#">
								<i class="fa-solid fa-phone-volume"></i>
							   Tienda
							</a>	
							<a href="#"><i class="fa-brands fa-instagram"></i></a>
							<a href="#"><i class="fa-brands fa-youtube"></i></a>
						</div>
                                                
                              
                    </div>
                                                
					</div>
						


				</div>
				<!--header_default-->
					
			</div>
		</header>
		<!-- HEADER -->



		<section class="banner">
			<div class="container">
				
				<div class="bannercontent">
					
<section class="banner" style="background-image: url('images/Pizza-3007395.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="bannercontent">
            <div class="text full">
                <h3>Recién cocido</h3>
                <h2>Para comer con amigos familiaris y mas ..</h2>
                <p><u>20% De Descuento</u> Los Fines de Semana</p>
            </div>
        </div>
    </div>
</section>
				<!--bannercontent-->
			</div>
		</section>
		<!-- BANNER -->
		<section class="contentblock about" id="about">
			<div class="container">
				<div class="contentinline">

					<div class="text">
						<h4>Porque nosotros siempre cumplimos!!! </h4>

							<li>Vuelven nuestras promociones por este mes de Julio..!!.</li>
						</ul>		
					</div>
					<div class="imagearea">
						<img src="images/promo.jpg" alt="" />
					</div>
				</div>
			</div>
		</section>
		<!-- ABOUT -->
		<section class="foodmenu" id="foodmenu">
			<div class="container">

				<h3>Lo mas probado !!!</h3>
				<h4>pruebalos solo o con amigos </h4>


				<div class="menuitems_wrap">
					

					<div class="item">
						<img src="images/coctels.jpg" alt="">
						<p>Una bunea bebida para acompañar tu comida!!</p>
					</div>


					<div class="item">
						<img src="images/menunu.jpg" alt="">
					
						<p>Pruba algo del menu </p>
					</div>



					<div class="item">
						<img src="images/promo.jpg" alt="">
				      <img src="images/3.png" alt="">
					</div>



				</div>
				<!--menuitems_wrap-->

			</div>
		</section>
		<!-- MENU -->

		<section class="contactsection" id="contact">
			<div class="container">
				<h3>¿Quieres tener una mesa reservar para una cena familar o para una cita?</h3>
				<h4><strong>Reserva desde la comodidad de tu hogar y reservalo desde aqui!!!

				<div class="contactform">
					<form id="contactform" action="tabreservas.php" method="post">
						
						<br clear="all" />
						<input type="submit" id="contactform_btn" value="Reservar ya!">
					</form>
				</div>

				
			</div>
		</section>
		<!-- CONTACT -->
		<section class="maparea" id="map">
			<div class="mapheading">
				<div class="container">
					Encuéntranos aqui!!!
				</div>
			</div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.263585099999!2d-77.0353001!3d-11.8867252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105d1c2d83ae769%3A0x4ba8f98337e1570b!2sVictorino%20Artesanal!5e0!3m2!1ses-419!2spe!4v1749642641740!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
	</body>
</html>