<?php check_admin(); ?>

<h1 class="title-tracking"> Manejar Tracking</h1>

<?php

//0 recién comprado = sin despachar
//1 Preparando el envío = Enviando
//2 En camino
//3 cuando el cliente confirma que le ha llegado la compra

$traking = $mysqli->query("SELECT * FROM factura WHERE status != 3");

if(isset($eliminar)){
    $eliminar =  clear($eliminar);
    $mysqli->query("DELETE FROM productos_compra WHERE idFactura = '$eliminar'");
    $mysqli->query("DELETE FROM factura WHERE idFactura = '$eliminar'");
    alert("Compra eliminada, envío cancelado");
    redir("?p=tracking");
}
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>Nombre de Cliente</th>
        <th>Fecha</th>
        <th>Monto</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>

<?php



while($r = mysqli_fetch_array($traking)){

$qcliente = $mysqli->query("SELECT * FROM cliente WHERE idCliente = '".$r['idCliente']."'");
$rcliente = mysqli_fetch_array($qcliente);
$cliente = $rcliente['nameCliente'];
$apellido = $rcliente['apellidoCliente'];

    if($r['status'] == 0){
        $status = "Sin despachar";
    }else if($r['status'] == 1){
        $status = "Preparando envío";
    }else if($r['status']==2){
        $status = "Despachado";
    }else if($r['status']==3){
        $status = "Finalizado";
    }else{
        $status = "Indefinido";
    }

    $fecha = fecha($r['fecha']);
    ?>
        <tr class="table-active">
      <td><?=$cliente.' '.$apellido?></td>
      <td><?=$fecha?></td>
      <td><?=$r['monto']?><?=$divisa2?></td>
      <td><?=$status?></td>
      <td>  <a href="?p=tracking&eliminar=<?=$r['idFactura']?>"><i class="icon icon-bin"></i> Eliminar Compra</a><br>
            <a href="?p=manejar-status&id=<?=$r['idCliente']?>"><i class="icon icon-pen"></i> Manejar Tracking</a><br>
            <a href="?p=ver-compra&id=<?=$r['idCliente']?>"><i class="icon icon-eye"></i> Ver Compra</a> 
      </td>
    </tr>



<?php
}
?>

    
  </tbody>
</table>