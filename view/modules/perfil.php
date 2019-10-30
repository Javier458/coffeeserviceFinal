<?php check_user("productos");?>

<h1 class="title_admin">Perfil de Usuario</h1>

<?php

$idCliente = clear($_SESSION['idCliente']);

$q = $mysqli->query("SELECT * FROM cliente WHERE idCliente = '$idCliente'");
$r = mysqli_fetch_array($q);

?>

<div class="photo-user">
<img src="user-photos/<?=$r['foto']?>" style="margin: 60px 120px 100px 100px;" class="rounded float-right" alt="<?=$r['nameCliente']?>" width="200" height="200">
</div>
<span class="badge badge-pill badge-success">Usuario Activo</span>

<form>
  <fieldset disabled>
    <div class="form-group">
      <label for="disabledTextInput">Nombres</label>
      <input type="text" id="disabledTextInput" class="form-control" style="max-width: 1000px;" placeholder="<?=$r['nameCliente']?>">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Apellidos</label>
      <input type="text" id="disabledTextInput" class="form-control" style="max-width: 1000px;" placeholder="<?=$r['apellidoCliente']?>">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Correo</label>
      <input type="text" id="disabledTextInput" class="form-control" style="max-width: 1000px;" placeholder="<?=$r['email']?>">
    </div>
  </fieldset>
</form>

<button href="?p=perfil&eliminar=<?=$r['idCliente']?>" type="button" class="btn btn-danger"><span class="icon-bin"></span> Eliminar Cuenta</button>
<button href="?p=pefil" type="button" class="btn btn-success"><span class="icon-pencil"></span> Editar informaci&oacute;n de la cuenta</button>

