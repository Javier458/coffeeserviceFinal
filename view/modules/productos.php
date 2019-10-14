<?php check_user("productos");?>

<h1 class="title-products">Todos los productos</h1>

<?php

if(isset($agregar) && isset($cantidad)){

    $idCliente = clear($_SESSION['idCliente']);
    $idProducto = clear($agregar);
    $cantidad = clear($cantidad);

    $v = $mysqli->query("SELECT * FROM carrito WHERE idCliente = '$idCliente' AND idProducto = '$idProducto'");

    if(mysqli_num_rows($v) > 0){

    $q = $mysqli->query("UPDATE carrito SET cantidad = cantidad + $cantidad WHERE idCliente = '$idCliente'");

}else{
    
    $q = $mysqli->query("INSERT INTO carrito (idCliente,idProducto,cantidad) VALUES ($idCliente,$idProducto,$cantidad)");

}
    alert("Se ha agregado al carro de compras");
    redir("?p=productos");
}


$q = $mysqli -> query("SELECT * FROM  producto ORDER BY idProducto DESC");
while($r = mysqli_fetch_array($q)){

    $precioDescuento = 0;

if($r['oferta'] > 0){
    if(strlen($r['oferta']) == 1){
        $desc = "0.0".$r['oferta'];
    }elseif($r['oferta'] == 100){
        $desc = 1;
    }else{
        $desc = "0.".$r['oferta'];
    }
    $precioDescuento = $r['price'] - ($r['price'] * $desc);  
}else{
    $precioDescuento = $r['price'];
}



?>

<div class="cards">
    <div class="productos">
  <img src="products/<?=$r['imagen']?>" class="card-img-top" alt="<?=$r['name']?>">
  <div class="card-body">
    <h5 class="card-title"><?=$r['name']?></h5>
    <p class="card-text"><?=$r['description']?></p>
    <?php
        if($r['oferta'] > 0){
            ?>
        <span class="precio"><b><?php if($precioDescuento == 0){ echo "GRATIS"; }else{ echo $precioDescuento.$divisa;}?></b></span>
        <br><br><del><?=$r['price']?><?=$divisa?></del>
        <?php
    }else{
        ?>
        <br><br>
        <span class="precio"><b><?=$r['price']?><?=$divisa?></b></span>
        <?php
    }
    
?>
    <br><br>
    <button class="btn btn-success" onclick="addCar('<?=$r['idProducto']?>');"><i class="icon icon-cart"></i>&nbsp;Agregar</button>
  </div>
</div>
</div>
<?php
}

?>

<script type="text/javascript">

function addCar(idProducto){
    var cantidad = prompt("¿Qué cantidad desea agregar?",1);

    if(cantidad.length > 0){
        window.location="?p=productos&agregar="+idProducto+"&cantidad="+cantidad;
    }
}
</script>