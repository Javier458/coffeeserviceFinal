<?php

if(isset($submit)){
    $adminname = clear($adminname);
    $password = clear($password);

    $q = $mysqli->query("SELECT * FROM admin WHERE adminname = '$adminname' AND password = '$password'");

  if(mysqli_num_rows($q)>0){
    $r = mysqli_fetch_array($q);
    $_SESSION['id'] = $r['id'];
    redir("?p=admin");
  }else{
    alert("Los datos no son validos");
    redir("?p=admin");
  }

}
if(isset($_SESSION['id'])){ //Si hay una sesión inicada
?>
<h1 class="title-panel-admin">Panel de Administrador</h1><br><br>

<a href="?p=agregar-producto">
<button type="button" class="btn btn-success">
<i class="icon icon-box-add"></i> Agregar Producto</button>
</a>

<br><br>

<a href="?p=agregar-categoria">
<button type="button" class="btn btn-danger">
<i class="icon icon-folder-plus"></i> Agregar Categor&iacute;a</button>
</a>

<br><br>

<a href="?p=tracking">
<button type="button" class="btn btn-warning">
<i class="icon icon-spinner3"></i> Tracking</button>
</a>




<?php
}else{ //Si no hay una sesión inicada
    ?>
<h1 class="title_admin">Iniciar Sesi&oacute;n como administrador</h1>

<form method="POST" action="">
  <div class="form-group">
    <label class="labellogin" for="login"><i class="icon icon-user-tie"></i> Administrador</label>
    <input type="text" class="form-control" name="adminname" id="adminname" placeholder="Nombre de Administrador" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su nombre de administrador con alguien más.</small>
  </div>
  <div class="form-group">
    <label class="labellogin" for="password"><i class="icon icon-key2"></i> Contrase&ntilde;a</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Contrase&ntilde;a">
  </div>
  <button type="submit" name="submit" class="btn btn-outline-primary"><i class="icon icon-user-plus"></i>  Ingresar</button>
</form>

    <?php
}

?>