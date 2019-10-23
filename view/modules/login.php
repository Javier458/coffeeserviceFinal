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

<form method="POST" action="">
  <div class="form-group">
    <label class="labellogin" for="login"><i class="icon icon-envelop"></i> &nbsp;Correo</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Ingresar Correo" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo con alguien más.</small>
  </div>
  <div class="form-group">
    <label class="labellogin" for="password"><i class="icon icon-key2"></i> Contrase&ntilde;a</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Contrase&ntilde;a">
  </div>
  <button type="submit" name="submit" class="btn btn-outline-primary"><i class="icon icon-user-plus"></i>  Ingresar</button>
</form>