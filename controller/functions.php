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

?>