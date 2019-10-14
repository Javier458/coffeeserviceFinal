<?php
if(isset($_SESSION['idCliente'])){
	redir("./");
}
	
if(isset($submit)){
	$email = clear($email);
	$password = clear($password);

	$q = $mysqli->query("SELECT * FROM cliente WHERE email = '$email' AND password = '$password'");

	if(mysqli_num_rows($q)>0){
		$r = mysqli_fetch_array($q);
        $_SESSION['idCliente'] = $r['idCliente'];
		if(isset($return)){
			redir("?p=".$return);
		}else{
			redir("./");
		}
	}else{
		alert("Los datos no son validos",0,'login');
		//redir("?p=login");
	}


}
	?>

<h1 class="title_admin">Iniciar Sesi&oacute;n</h1>

    
<form class="form-3" method="POST" action="">
    <p class="clearfix">
        <label for="login"><i class="icon icon-envelop"></i> Correo</label>
        <input type="text" name="email" id="email" placeholder="Ingresar Correo">
    </p>
    <p class="clearfix">
        <label for="password"><i class="icon icon-key"></i> Contrase&ntilde;a</label>
        <input type="password" name="password" id="password" placeholder="Contrase&ntilde;a"> 
    </p>
    <div class="btnadmin">
    <p class="clearfix-btn">
    <button type="submit" name="submit" class="btn btn-outline-primary"><i class="icon icon-user-plus"></i>  Ingresar</button>
    </p>
    </div>       
</form>