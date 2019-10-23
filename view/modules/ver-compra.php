<?php check_admin(); ?>

<?php

$id = clear($id);

$s = $mysqli->query("SELECT * FROM factura WHERE idCliente = '$id'");
$r = mysqli_fetch_array($s);

$sc = $mysqli->query("SELECT * FROM cliente WHERE idCliente = '".$r['idCliente']."'");
$rc = mysqli_fetch_array($sc);

$nameCliente = $rc['nameCliente'];
$apellidoCliente = $rc['apellidoCliente'];


?>

<h1 class="title-ver"><i class="icon-eye"></i> Viendo compra de: <span style="color:gray;"><?=$nameCliente?> <?=$apellidoCliente?></span></h1>

Fecha: <?=fecha($r['fecha'])?><br>
Monto: <?=number_format($r['monto'])?> <?=$divisa?> <br>
Estado: <?=status($r['status'])?>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>Nombre de Producto</th>
        <th>Cantidad</th>
        <th>Monto</th>
        <th>Monto Total</th>
    </tr>
  </thead>
  <tbody>
<tr class="table-active">
      <td><?//=$nombreProducto?></td>
      <td><?//=$rp['cantidad']?></td>
      <td><?//=$rp['monto']?></td>
      <td><?//$montoTotal?></td>
    </tr>
  </tbody>
</table>

