<?php
check_admin();

$idProducto = clear($idProducto);

$q1 = $mysqli->query("SELECT * FROM producto WHERE idProducto = '$idProducto'");
$rq = mysqli_fetch_array($q1);

if(isset($submit)){
    $idProducto = clear($idProducto);
    $name = clear($name);
    $price = clear($price);
    $description = clear($description);
    $oferta = clear($oferta);
    $idCategoria = clear($idCategoria);

$mysqli->query("UPDATE producto SET name = '$name', price = '$price', description = '$description', oferta = '$oferta', idCategoria = '$idCategoria'
                    WHERE idProducto = '$idProducto'");
        alert("Información de producto modificada con éxito");
        redir("?p=agregar-producto");


}

?>

<h1 class="modify-product">Modificar producto</h1>

<form method="POST" action="" enctype="multipart/form-data">
    
    <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?=$rq['name']?>" placeholder="Nombre del producto" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="price" value="<?=$rq['price']?>" placeholder="Precio del producto" required>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="description" value="<?=$rq['description']?>" maxlength="124" placeholder="Descripción del producto" required>
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
          <option <?php if($rq['oferta'] == 0){echo "selected";} ?> value="0">0% de descuento</option>
          <option <?php if($rq['oferta'] == 10){echo "selected";} ?> value="10">10% de descuento</option>
          <option <?php if($rq['oferta'] == 20){echo "selected";} ?> value="20">20% de descuento</option>
          <option <?php if($rq['oferta'] == 30){echo "selected";} ?> value="30">30% de descuento</option>
          <option <?php if($rq['oferta'] == 40){echo "selected";} ?> value="40">40% de descuento</option>
          <option <?php if($rq['oferta'] == 50){echo "selected";} ?> value="50">50% de descuento</option>
          <option <?php if($rq['oferta'] == 60){echo "selected";} ?> value="60">60% de descuento</option>
          <option <?php if($rq['oferta'] == 70){echo "selected";} ?> value="70">70% de descuento</option>
          <option <?php if($rq['oferta'] == 80){echo "selected";} ?> value="80">80% de descuento</option>
          <option <?php if($rq['oferta'] == 90){echo "selected";} ?> value="90">90% de descuento</option>
          <option <?php if($rq['oferta'] == 100){echo "selected";} ?> value="100">100% de descuento | GRATIS</option>
          
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-success"><i class="icon icon-box-add"></i> Modificar Producto</button>
    &nbsp;&nbsp;&nbsp;
    <a href="?p=agregar-producto"><button type="button" class="btn btn-danger"><i class="icon icon-cancel-circle"></i> Cancelar</button></a>


    <input type="hidden" name="idProducto" value="<?=$idProducto?>"/>
</form>

