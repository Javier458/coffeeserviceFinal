<?php check_admin(); ?>

<?php

if(isset($submit)){
    $nameCategoria = clear($nameCategoria);

    $s = $mysqli->query("SELECT * FROM categoria WHERE nameCategoria = '$nameCategoria'");

    if(mysqli_num_rows($s)>0){

        alert("Esta categoría ya fue registrada en la base de datos");
        redir("");

    }else{
        $mysqli->query("INSERT INTO categoria (nameCategoria) VALUES ('$nameCategoria')");
        alert("Categoría añadida con éxito");
        redir("");
    }
}

if(isset($eliminar)){
    $eliminar = clear($eliminar);
    $mysqli->query("DELETE FROM categoria WHERE id = '$eliminar'");
    alert("Categoría eliminada con éxito");
    redir("?p=agregar-categoria");
}

?>



<h1 class="add-category">Añadir Categor&iacute;a</h1>

<form action="" method="POST">

<div class="form-group">
    <label for="categoria">Nombre de la categor&iacute;a</label>
    <input type="text" class="form-control" name="nameCategoria" placeholder="Ingrese el nombre de la categor&iacute;a">
</div>


<button type="submit" class="btn btn-success" name="submit">
<i class="icon icon-folder-plus"></i> Agregar Categor&iacute;a
</button>

&nbsp;&nbsp;&nbsp;
<a href="?p=admin"><button type="button" class="btn btn-danger"><i class="icon icon-cancel-circle"></i> Cancelar</button></a>

</form>

<br><br>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>ID Categor&iacute;a</th>
        <th>Nombre de categor&iacute;a</th>
        <th>Acciones</th>
    </tr>
  </thead>
<?php 

$q = $mysqli->query("SELECT * FROM categoria ORDER BY nameCategoria ASC");

while($r=mysqli_fetch_array($q)){
    ?>
  
  <tbody>
    <tr class="table-active">
      <td><?=$r['id'];?></td>
      <td><?=$r['nameCategoria'];?></td>
      <td><a href="?p=agregar-categoria&eliminar=<?=$r['id']?>"><i class="icon icon-bin"></i></a></td>
      
    </tr>
</tbody>


<?php
}

?>
</table>