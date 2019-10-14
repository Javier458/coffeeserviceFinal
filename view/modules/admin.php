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

    
<form class="form-3" method="POST" action="">
    <p class="clearfix">
        <label for="login"><i class="icon icon-user-tie"></i> Administrador</label>
        <input type="text" name="adminname" id="adminname" placeholder="Nombre de Administrador">
    </p>
    <p class="clearfix">
        <label for="password"><i class="icon icon-key2"></i> Contrase&ntilde;a</label>
        <input type="password" name="password" id="password" placeholder="Contrase&ntilde;a"> 
    </p>
    <div class="btnadmin">
    <p class="clearfix-btn">
    <button type="submit" name="submit" class="btn btn-outline-primary"><i class="icon icon-user-plus"></i>  Ingresar</button>
    </p>
    </div>       
</form>

    <?php
}

?>