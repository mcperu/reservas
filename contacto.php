<?php
require_once("Config/Config.php");


if(isset($_SESSION['languague_'])){
    
    $lang = $_SESSION['languague_'];
}else{
    $_SESSION['languague_'] = "es";
    $lang = $_SESSION['languague_'];
}

?>

<!doctype html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arapaima Expeditions</title>
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  </head>
  <body>
    <!-- ************************************************************** -->
    <!-- *************************  cabecera  ************************* -->
    <!-- ************************************************************** -->
    <header>
        <div id="desktop" class="container-fluid header text-center">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href="index.php"><img class="logo" src="img/logo.png" alt="Arapaima Expeditions"></a>
                </div>
                <div class="col-md-8">
                    <ul class="menu ">
                    <li><a href="index.php"><?= $lang == 'es' ? NAV_HOME_ES : NAV_HOME_EN ?></a></li>
                        <li><a href="nosotros.php"><?= $lang == 'es' ? NAV_ABOUT_ES : NAV_ABOUT_EN ?></a></li>
                        <li><a href=""><?= $lang == 'es' ? NAV_SERVICE1_ES : NAV_SERVICE1_EN ?></a></li>
<!--                         <li><a href=""><?= $lang == 'es' ? NAV_SERVICE2_ES : NAV_SERVICE2_EN ?></a></li>
                        <li><a href=""><?= $lang == 'es' ? NAV_SERVICE3_ES : NAV_SERVICE3_EN ?></a></li> -->
                        <li><a href="contacto.php"><?= $lang == 'es' ? NAV_CONTACT_ES : NAV_CONTACT_EN ?></a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="social">
                        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=51992034855&text=Hola%20Arapaima,%20deseo%20mas%20informaci%C3%B3n%20mi%20nombre%20es:"><i class="fa fa-whatsapp " aria-hidden="true"></i> (+51) 992 034 855</a></li>
                  </ul>
                  <ul class="idioma">
                    <li><a href="index.php?lang=en">Engish</a></li>
                    <li><a href="index.php?lang=es">Español</a></li>
                  </ul>
                </div>
            </div>
        </div>
        <div id="mobile"  class="container-fluid header" >

            <div class="header-mb">
                <img class="logo-mb" src="img/logo-small.png" alt="Arapaima Expeditions">
                <ul class="eng">
                        <li><a href="index.php?lang=en">Engish</a></li>
                        <li><a href="index.php?lang=es">Español</a></li>
                </ul>
                <i id="hamburguer" class="fa fa-bars" aria-hidden="true"></i>
                <i  id="close" class="hidden fa fa-times" aria-hidden="true"></i>
            </div>
            <div class="body-mb">
                <ul id="menu-mb" class="hidden">
                        <li class="active"><a href="index.php"><?= $lang == 'es' ? NAV_HOME_ES : NAV_HOME_EN ?></a></li>
                        <li><a href="nosotros.php"><?= $lang == 'es' ? NAV_ABOUT_ES : NAV_ABOUT_EN ?></a></li>
                        <li><a href=""><?= $lang == 'es' ? NAV_SERVICE1_ES : NAV_SERVICE1_EN ?></a></li>
<!--                         <li><a href=""><?= $lang == 'es' ? NAV_SERVICE2_ES : NAV_SERVICE2_EN ?></a></li>
                        <li><a href=""><?= $lang == 'es' ? NAV_SERVICE3_ES : NAV_SERVICE3_EN ?></a></li> -->
                        <li><a href="contacto.php"><?= $lang == 'es' ? NAV_CONTACT_ES : NAV_CONTACT_EN ?></a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- ************************************************************** -->
    <!-- *************************  /cabecera  ************************* -->
    <!-- ************************************************************** -->

    <!-- ************************************************************** -->
    <!-- *************************  portada  ************************* -->
    <!-- ************************************************************** -->
<section class="banner">
    <div class="capa">
        <h1 class="bannerTit"><?= $lang == 'es' ? C_ES : C_EN ?></h1>
    </div>
    
</section>

    <!-- ************************************************************** -->
    <!-- *************************  /portada  ************************* -->
    <!-- ************************************************************** -->
    <div class="container-fluid detalle">
        <ul class="breadcrumb">
            <li><a href="#"><?= $lang == 'es' ? NAV_HOME_ES : NAV_HOME_EN ?></a></li> / 
            <li class="active"><strong> <?= $lang == 'es' ? C_ES : C_EN ?> </strong></li>
        </ul>
    </div>
    <!-- ************************************************************** -->
    <!-- *************************  informacion statica  ************************* -->
    <!-- ************************************************************** -->    
<section class="staticData">
    <!-- titulo -->
    <h2 class="text-success"><?= $lang == 'es' ? C_ES : C_EN ?></h2>
    <!-- /titulo -->
    <div class="clearfix"></div>
    <div class="espacio"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="conProd">
                  <form action="" method="post">
                    
                        <div class="nombre">
                            <label class="frmInputCont" for="Nombre"><?= $lang == 'es' ? FRM_N_ES : FRM_N_EN ?> <span class="required">*</span></label>
                             <input  required for="Nombre" type="text" placeholder="<?= $lang == 'es' ? FRM_N_ES : FRM_N_EN ?>">
                        </div>
                        <div class="nombre">
                            <label class="frmInputCont" for="Nombre"><?= $lang == 'es' ? FRM_E_ES : FRM_E_EN ?> <span class="required">*</span></label>
                             <input  required for="Nombre" type="email" placeholder="<?= $lang == 'es' ? FRM_E_ES : FRM_E_EN ?>">
                        </div>
                        <div class="nombre">
                            <label class="frmInputCont"  for="Nombre"><?= $lang == 'es' ? FRM_C_ES : FRM_C_EN ?> <span class="required">*</span></label> 
                            <input required  for="Nombre" type="text" placeholder="<?= $lang == 'es' ? FRM_C_ES : FRM_C_EN ?>">
                        </div>
                        <div class="nombre">
                            <label class="frmInputCont"  for=""><?= $lang == 'es' ? FRM_M_ES : FRM_M_EN ?> <span class="required">*</span></label>
                            <textarea required name="" id="" cols="10" rows="5" placeholder="<?= $lang == 'es' ? FRM_M_ES : FRM_M_EN ?>"></textarea>
                        </div>
                        
                        <div><input class="btn btn-success" type="submit" value="<?= $lang == 'es' ? FRM_BT_ES : FRM_BT_EN ?>"></div>
                     
                  </form>
                </div>
            </div>
            <div class="col-md-6">
                
                <div class="descripciond">
                    <h3><?= $lang == 'es' ? F_T_ES : F_T_EN ?></h3>
                    <ul class="linksocialc">
                        <li><a target="_blank" href="https://facebook.com"><i class="fa fa-facebook " aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://instagram.com"><i class="fa fa-instagram " aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://linkedin.com"><i class="fa fa-linkedin " aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://tiktok.com"><img src="img/logos_tiktok-icon.png" alt=""></a></li>
                        <li><a target="_blank" href="https://twitter.com"><i class="fa fa-twitter " aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://youtube.com"><i class="fa fa-youtube " aria-hidden="true"></i></a></li>
                        
                    </ul>
                   
                </div>
            </div>

        </div>
    </div>
</section>


    <!-- ************************************************************** -->
    <!-- *************************  /informacion statica  ************************* -->
    <!-- ************************************************************** -->    

  

<div class="espacio"></div>
<footer>
    <div class="espacio"></div>
	<div class="contenedor1">
		<div class="box1">
		<a href="#"><img src="img/logo.png" alt=""></a>
        <span><?= $lang == 'es' ? F_ES : F_EN ?>

        </span>
		</div>
		<div class="box1">
			<h3>Arapaima</h3>
			<ul class="links">
            <li><a href="nosotros.php"><?= $lang == 'es' ? NAV_ABOUT_ES : NAV_ABOUT_EN ?></a></li>

				<li><a href="contacto.php"><?= $lang == 'es' ? NAV_CONTACT_ES : NAV_CONTACT_EN ?></a></li>
 
			</ul>
		</div>
		<div class="box1">
			<h3><?= $lang == 'es' ? F_2_ES : F_2_EN ?></h3>
			<ul class="linksCont">
				<li><a href="#"><?= $lang == 'es' ? F_ADR_ES : F_ADR_EN ?>
                </a></li>
				<li><a href="#"> +51 992 034 855</a></li>
             
				<li><a href="#">info@arapaimaexpeditions.com</a></li>
			 
			</ul>
		</div>
		<div class="box1">
			<h3><?= $lang == 'es' ? F_T_ES : F_T_EN ?></h3>
			<ul class="linksocial">
				<li><a href="#"><i class="fa fa-facebook " aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram " aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin " aria-hidden="true"></i></a></li>
				
			</ul>
		</div>
	</div>
	<div class="contenedor2">
		<div class="compa"> <span>ARAPAIMA EXPEDITIONS  © | All rights reserved 2023</span></div>
		<div class="copyr"> <a href="#">Powered By FR SYSTEM S.A.C.</a></div>


	</div>
</footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/general.js"></script>
    <script src="js/script.js"></script>
   <script src="js/bootstrap.min.js"></script>
<!--    <script src="js/bootstrap.min.js.map"></script> -->
</body>
</html>