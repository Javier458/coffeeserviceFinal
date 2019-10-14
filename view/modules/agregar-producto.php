<?php
check_admin();

if(isset($submit)){
    $name = clear($name);
    $price = clear($price);
    $description = clear($description);
    $oferta = clear($oferta);
    $idCategoria = clear($idCategoria);

    $imagen = "";

    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        $imagen = $name.rand(0,1000).".png";
        move_uploaded_file($_FILES['imagen']['tmp_name'], "products/".$imagen);
    }

$mysqli->query("INSERT INTO producto (name,price,imagen,description,oferta,idCategoria) VALUES ('$name','$price','$imagen','$description','$oferta','$idCategoria')");
	alert("Producto agregado");
	redir("?p=agregar-producto");
}

if(isset($eliminar)){
    $eliminar = clear($eliminar);
    $mysqli->query("DELETE FROM producto WHERE idProducto = '$eliminar'");
    alert("Producto eliminado con éxito");
    redir("?p=agregar-producto");
}
?>

<h1 class="add-product">Añadir producto</h1>

<form method="POST" action="" enctype="multipart/form-data">
    
    <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Nombre del producto" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="price" placeholder="Precio del producto" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="description" maxlength="124" placeholder="Descripción del producto" required>
    </div>

    <label for="Imagen del producto">Imagen del Producto</label>

    <div class="form-group">
        <input type="file" title="Imagen del producto" class="form-control" name="imagen" placeholder="Imagen del producto" required>
    </div>

    <div class="form-group">
      <select name="idCategoria" required class="form-control">
        <option value="">Seleccione una categoría...</option>
        <?php
       $qc = $mysqli->query("SELECT * FROM categoria ORDER BY nameCategoria ASC");
          while($rc=mysqli_fetch_array($qc)){
            ?>
              <option value="<?=$rc['id']?>"><?=$rc['nameCategoria']?></option>

            <?php
          }                           
        ?>
      </select>
    </div>                            

    <div class="form-group">
      <select name="oferta" required class="form-control">
        <option value="0">0% de descuento</option>
        <option value="10">10% de descuento</option>
        <option value="20">20% de descuento</option>
        <option value="30">30% de descuento</option>
        <option value="40">40% de descuento</option>
        <option value="50">50% de descuento</option>
        <option value="60">60% de descuento</option>
        <option value="70">70% de descuento</option>
        <option value="80">80% de descuento</option>
        <option value="90">90% de descuento</option>
        <option value="100">100% de descuento | GRATIS</option>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-success"><i class="icon icon-box-add"></i> Agregar Producto</button>
    &nbsp;&nbsp;&nbsp;
    <a href="?p=admin"><button type="button" class="btn btn-danger"><i class="icon icon-cancel-circle"></i> Cancelar</button></a>

</form>

<br>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>Imagen Producto</th>
        <th>Nombre Producto</th>
        <th>Categoría</th>
        <th>Descripci&oacute;n</th>
        <th>Precio</th>
        <th>Descuento</th>
        <th>Valor con Descuento</th>
        <th>Acciones</th>
    </tr>
  </thead>




<?php


$prod = $mysqli->query("SELECT * FROM producto ORDER BY name ASC");
while($rp = mysqli_fetch_array($prod)){

  $precioDescuento = 0;

$cat = $mysqli->query("SELECT * FROM categoria WHERE id = '".$rp['idCategoria']."'");

  if(mysqli_num_rows($cat)>0){
    $rcat = mysqli_fetch_array($cat);
    $nameCategoria = $rcat['nameCategoria'];
  }else{
    $nameCategoria = "--";
  }

  if($rp['oferta'] > 0){
    if(strlen($rp['oferta']) == 1){
      $desc = "0.0".$rp['oferta'];
    }elseif($rp['oferta'] == 100){
      $desc = 1;
    }else{
      $desc = "0.".$rp['oferta'];
    }
    $precioDescuento = $rp['price'] - ($rp['price'] * $desc);  
  }else{
    $precioDescuento = $rp['price'];
  }




$imagen = $rp['imagen'];
$nombreProducto = $rp['name'];
$description = $rp['description'];
$precioUnidad = $rp['price'];
$oferta = $rp['oferta'];

    ?>
  <tbody>
    <tr class="table-active">
      <th scope="row"><img class="img-car" src="products/<?=$rp['imagen']?>" alt="<?=$rp['name']?>"></th>
      <td><?=$nombreProducto?></td>
      <td><?=$nameCategoria?></td>
      <td><?=$description?></td>
      <td><?=$precioUnidad?></td>
      <td><?php if($rp['oferta']>0){echo $rp['oferta'].$descuento;}else{echo "Sin descuento";}?></td>
      <td><?php if($precioDescuento == 0){ echo "GRATIS"; }else{ echo $precioDescuento;} ?></td>
      <td>  <a href="?p=agregar-producto&eliminar=<?=$rp['idProducto']?>"><i class="icon icon-bin"></i> Borrar</a>
            <a href="?p=modificar-producto&idProducto=<?=$rp['idProducto']?>"><i class="icon icon-cog"></i>Editar</a>
      </td>
    </tr>
  </tbody>

<?php
}
?>

</table>