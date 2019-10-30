<?php
include '../controller/config.php';
include '../controller/connection.php';
include '../controller/functions.php';

if(!isset($p)){
	$p = "principal";
}else{
	$p = $p;
}

?>

<?php
$idCliente = clear($_SESSION['idCliente']);

$q = $mysqli->query("SELECT * FROM cliente WHERE idCliente = '$idCliente'");
$r = mysqli_fetch_array($q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/index15.css">
	<link rel="stylesheet" type="text/css" href="library/icomoon/style.css">
	<link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css" >

	<title>CoffeeService</title>
</head>
<body>

<div class="header">

<img class="logo" src="img/Logo CoffeeService.jpg" alt="logo">
CoffeeService
<img class="logo" src="img/Logo CoffeeService.jpg" alt="logo">

</div>

<header>
<div class="menu_hamburguesa">
	<a href="#" class="bt-menu"><span class="icon-menu"></span> Menú</a>
</div>
<nav>
<ul>
	<li class="t1"><a href="?p=principal"><span class="primero"><i class="icon icon-home"></i></span>Principal</a></li>
	<li class="t2"><a href="?p=productos"><span class="segundo"><i class="icon icon-price-tags"></i></span>Productos</a></li>
	<li class="t3"><a href="?p=ofertas"><span class="tercero"><i class="icon icon-price-tag"></i></span>Ofertas</a></li>
	<li class="t4"><a href="?p=carrito"><span class="cuarto"><i class="icon icon-cart"></i></span>Carrito</a></li>
	<li class="t5"><a href="?p=admin"><span class="quinto"><i class="icon icon-user-tie"></i></span>Administrador</a></li>

<?php
if(isset($_SESSION['idCliente'])){
?>


	<li class="t6"><a href="?p=perfil"><span class="sexto"><i class="icon icon-profile"></i></span>
	<img src="user-photos/<?=$r['foto']?>" class="rounded float-left" alt="<?=$r['nameCliente']?>" width="30" height="30">
	<?=nameCliente($_SESSION['idCliente'])?></a></li>
	<li class="t7"><a href="?p=logout"><span class="septimo"><i class="icon icon-enter"></i></span>Cerrar Sesión</a></li>
<?php
}else{
?>
	<li class="t7"><a href="?p=register"><span class="septimo"><i class="icon icon-user-plus"></i></span>Registro</a></li>
	<li class="t6"><a href="?p=login"><span class="sexto"><i class="icon icon-user"></i></span>Iniciar Sesi&oacute;n</a></li>
<?php
}
?>



</ul>
</nav>
</header>
	
<div class="cuerpo">
<?php
if(file_exists("modules/".$p.".php")){
	include "modules/".$p.".php";
}else{
	echo "<i>No se ha encontrado el modulo <b>".$p."</b> "."<a href='./'>Regresar</a></b></i><br><br>";
}


?>

</div>

<footer>
       
	<div class="container-footer-all">
		 
		 <div class="container-body">
 
			 <div class="column1">
					<h1>Mas informaci&oacute;n de la compa&ntilde;&iacute;a</h1>

					<p>CoffeeService ha sido creada por un grupo de estudiantes de la Instituci&oacute;n Educativa Asamblea
						Departamental, con una visión ambiciosa de implementar las TIC (Tecnolog&iacute;as de la 
						informaci&oacute;n y de la comunicaci&oacute;n) en las instituciones de la ciudad de Medell&iacute;n.
						<br> Uno de los objetivos de CoffeeService es llegar a todos los departamentos de Colombia y establecerse
						nacionalmente.
					</p>

			 </div>
 
			<div class="column2">
				<h1>Redes Sociales</h1>

				<div class="row">
				<a href="$"><img src="img/facebook.png"></a>
				<label>Siguenos en Facebook</label>
				</div>
					<div class="row">
					<a href="$"><img src="img/twitter.png"></a>
					<label>Siguenos en Twitter</label>
					</div>
				<div class="row">
				<a href="$"><img src="img/instagram.png"></a>
				<label>Siguenos en Instagram</label>
				</div>
					<div class="row">
					<a href="$"><img src="img/youtube.png"></a>
					<label>Siguenos en YouTube</label>
					</div>
				<div class="row">
				<a href="$"><img src="img/pinterest.png"></a>
				<label>Siguenos en Pinteres</label>
				</div>
 
 
			</div>
 
			<div class="column3">

			<h1>Informaci&oacute;n Contactos</h1>

					<div class="row2">
					<img src="img/house.png" alt="address">
					<label>Medell&iacute;n,
							Colombia
							Barrio
							Casa # 24
							</label>
					</div>
		 
					<div class="row2">
						<img src="img/smartphone.png" alt="phone">
						<label>+57 300 290 93 33</label>
					</div>
						 
					<div class="row2">
						<img src="img/contact.png" alt="email">
						<label>CoffeeService@gmail.com</label>
					</div>

						<br><br>
					<p><i class="icon icon-users"></i> &nbsp;Usuarios registrados: <?php //echo $total_users; ?></p>
			</div>
 
		</div>
		 
		 </div>
		 
		 <div class="container-footer">
				<div class="footer">
					<div class="copyright">
						&copy; 2019 Todos los Derechos Reservados | <a href="$">CoffeeService</a>
					</div>
				
					<div class="information"> <a href="$">Informaci&oacute;n Compa&ntilde;&iacute;a</a> |  
					<a href="$">Privaci&oacute;n Pol&iacute;tica</a> | <a href="$">T&eacute;rminos y condiciones</a>
					</div>
				 </div>
 
			 </div>
		 
	 </footer>
	 <scroll-page id="page-1"></scroll-page>

	 <script src="js/main.js"></script>
	 <script src="js/menu.js"></script>

</body>
</html>