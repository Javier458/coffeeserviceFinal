<?php

function clear($var){
    htmlspecialchars($var);

    return $var;
}

function check_admin(){
    if(!isset($_SESSION['id'])){
        redir("./");
    }
}

function redir($var){
    ?>
        <script type="text/javascript">
    window.location="<?=$var?>";
        </script>
    <?php
    die();
}

function alert($var){
    ?>
<script type="text/javascript">
alert("<?=$var?>");
</script>
    <?php
}

function check_user($url){
    if(!isset($_SESSION['idCliente'])){
        redir("?p=login&return=$url");
    }else{

    }
}

function connect(){
    $host_mysql = "localhost";
    $user_mysql = "root";
    $pass_mysql = "";
    $db_mysql = "cfs";

    $mysqli = mysqli_connect($host_mysql,$user_mysql,$pass_mysql,$db_mysql) or die ("Error al conectar al servidor");

    return $mysqli;

}

function nameCliente($idCliente){
	$mysqli = connect();

	$q = $mysqli->query("SELECT * FROM cliente WHERE idCliente = '$idCliente'");
	$r = mysqli_fetch_array($q);
	return $r['nameCliente'];
}

function fecha($fecha){
    $e = explode("-",$fecha);
    $year = $e[0];
    $month = $e[1];
    $e2 = explode(" ",$e[2]);
    $day = $e2[0];
    $time = $e2[1];
    $e3 = explode(":", $time);
    $hour = $e3[0];
    $mins = $e3[1];

if($month == 1){
    $month = "Enero";
}else if ($month == 2){
    $month = "Febrero";   
}else if ($month == 3){
    $month = "Marzo";   
}else if ($month == 4){
    $month = "Abril";   
}else if ($month == 5){
    $month = "Mayo";   
}else if ($month == 6){
    $month = "Junio";   
}else if ($month == 7){
    $month = "Julio";   
}else if ($month == 8){
    $month = "Agosto";   
}else if ($month == 9){
    $month = "Septiembre";   
}else if ($month == 10){
    $month = "Octubre";   
}else if ($month == 11){
    $month = "Noviembre";   
}else if ($month == 12){
    $month = "Diciembre";   
}else{
    $month = "Indefinido";
}

    return $day."/".$month."/".$year." ".$hour.":".$mins;
}

function status($idStatus){
    if($idStatus == 0){
        $status = "Sin despachar";
    }else if($idStatus == 1){
        $status = "Preparando envío";
    }else if($idStatus==2){
        $status = "Despachado";
    }else if($idStatus==3){
        $status = "Finalizado";
    }else{
        $status = "Indefinido";
    }

    return $status;
}
?>