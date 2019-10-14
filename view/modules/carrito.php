<?php check_user("carrito");?>


<?php

if(isset($finalizar)){

    $monto = clear($montoTotal);

    $idCliente = clear($_SESSION['idCliente']);
    $q = $mysqli->query("INSERT INTO factura (idCliente,fecha,monto,status) VALUES ('$idCliente',NOW(),'$monto',0)");

    $sc = $mysqli->query("SELECT * FROM factura WHERE idCliente = '$idCliente' ORDER BY idFactura DESC LIMIT 1");
    $rc = mysqli_fetch_array($sc);

    $ultimaCompra = $rc['idFactura'];

    $q2 = $mysqli->query("SELECT * FROM carrito WHERE idCliente = '$idCliente'");

    while($r2=mysqli_fetch_array($q2)){

      $sp = $mysqli->query("SELECT * FROM producto WHERE idProducto = '".$r2['idProducto']."'");
      $rp = mysqli_fetch_array($sp);

      $monto = $rp['price'];

        $mysqli->query("INSERT INTO productos_compra (idFactura,idProducto,cantidad,monto) 
                       VALUES ('$ultimaCompra','".$r2['idProducto']."','".$r2['cantidad']."','$monto')");
    }

     $mysqli->query("DELETE FROM carrito WHERE idCliente = '$idCliente'");

    alert("Se ha finalizado la compra");
    redir("./");

}

?>



<h1 class="title-carrito"><i class="icon icon-cart"></i> Carrito de Compras</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>Imagen Producto</th>
        <th>Nombre Producto</th>
        <th>Cantidad</th>
        <th>Precio c/u</th>
        <th>Precio Total</th>
    </tr>
  </thead>


<?php

$idCliente = clear($_SESSION['idCliente']);
$q = $mysqli->query("SELECT * FROM carrito WHERE idCliente = '$idCliente'");
$montoTotal = 0;

while($r = mysqli_fetch_array($q)){
$q2 = $mysqli->query("SELECT * FROM producto WHERE idProducto = '".$r['idProducto']."'");
$r2 = mysqli_fetch_array($q2);

$imagen = $r2['imagen'];
$nombreProducto = $r2['name'];
$cantidad = $r['cantidad'];
$precioUnidad = $r2['price'];
$precioTotal = $cantidad * $precioUnidad;

$montoTotal = $montoTotal + $precioTotal;

    ?>
  <tbody>
    <tr class="table-active">
      <th scope="row"><img class="img-car" src="products/<?=$r2['imagen']?>" alt="<?=$r2['name']?>"></th>
      <td><?=$nombreProducto?></td>
      <td><?=$cantidad?></td>
      <td><?=$divisa2?><?=$precioUnidad?></td>
      <td><?=$divisa2?><?=$precioTotal?></td>
    </tr>
  </tbody>

<?php
}
?>

</table>
<br>
<div class="alert alert-success" role="alert" style="font-size:20px">
  <b>Monto Total:</b> <b style="font-size:25px; color:green;"><?=$montoTotal?><?=$divisa?></b>
</div>

<form method="POST" action="">
    <input type="hidden" name="montoTotal" value="<?=$montoTotal?>">
<button class="btn btn-outline-success" type="submit" name="finalizar"><b><i class="icon icon-cart"></i> Finalizar Compra</b></button>
</form>



