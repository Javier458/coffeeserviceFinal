<?php
if(isset($submit)){
    $nameCliente = clear($nameCliente);
    $apellidoCliente = clear($apellidoCliente);
    $email = clear($email);
    $password = clear($password);
    
    $foto = "";
    
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        $foto = $nameCliente.rand(0,1000).".png";
        move_uploaded_file($_FILES['foto']['tmp_name'], "user-photos/".$foto);
}

$mysqli->query("INSERT INTO cliente (nameCliente, apellidoCliente, email, password, foto) VALUES ('$nameCliente','$apellidoCliente','$email','$password','$foto')");
alert("Se ha registrado correctamente, ahora puede iniciar sesión");
redir("?p=login");

}
?>


<h1 class="title_admin">Registro de Usuario</h1>

<form method="POST" action="" enctype="multipart/form-data">
    
    <div class="form-group">
        <input type="text" class="form-control" name="nameCliente" placeholder="Ingrese sus nombres" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="apellidoCliente" placeholder="Ingrese sus apellidos" required>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" required>
    </div>

    <div class="form-group">
        <input type="password" class="form-control" name="password" maxlength="16" placeholder="Ingrese su contrase&ntilde;a" required>
    </div>

    <label for="foto">Foto</label>

    <div class="form-group">
        <input type="file" title="Foto" class="form-control" name="foto" placeholder="Adjunte una foto" required>
    </div>                        

    <button type="submit" name="submit" class="btn btn-success"><i class="icon icon-user-plus"></i> Registrar</button>
    &nbsp;&nbsp;&nbsp;
    <a href="?p=principal"><button type="button" class="btn btn-danger"><i class="icon icon-cancel-circle"></i> Cancelar</button></a>

</form>