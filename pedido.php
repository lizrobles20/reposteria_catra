<?php
include('process.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}
if (isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ./index.php');
  session_destroy();
}
$id = $_SESSION['user']['id_usuario'];
$db = mysqli_connect('localhost', 'root', '', 'catrabd');

if (isset($_POST['cerrar'])){
  $file_nombreCliente = $_POST['nombre'];
  $file_apellidosCliente = $_POST['apellidos'];
  $file_calle = $_POST['calle'];
  $file_numExt = $_POST['numE'];
  $file_colonia = $_POST['colonia'];
  $file_numInt = $_POST['numI'];
  $file_tel = $_POST['tel'];
  $file_emailCliente = $_POST['email'];
  $file_indicaciones = $_POST['texto'];
  $file_opcion = $_POST['opciones'];

  if(empty($file_nombreCliente)){}else{
    $sql= "INSERT into detalles (id_usuario, nombre_cliente, apellidos_cliente, calle, numExt, colonia, numInt, telefono, correo, indicaciones, metodoPago) 
    VALUES('$id', '$file_nombreCliente', '$file_apellidosCliente', '$file_calle', '$file_numExt', '$file_colonia', '$file_numInt', '$file_tel', '$file_emailCliente', '$file_indicaciones', '$file_opcion')";
    mysqli_query($db,$sql);
    } 
  }
  if (isset($_POST['cerrar'])){
      $query = "SELECT id_detalles FROM detalles WHERE id_usuario = '$id' ORDER BY id_detalles DESC";
      $resultado = mysqli_query($db,$query);
      $detalle = mysqli_fetch_assoc($resultado);
      $det = $detalle['id_detalles'];
      $total = $_POST['tdTot'];
      $product = $_POST['prod'];
      $sql= "INSERT into pedidos (id_usuario, id_detalles, producto, total) 
      VALUES('$id', '$det', '$product', '$total')";
      mysqli_query($db,$sql);
      header('location: cliente.php'); 
    }
    
?>

<!DOCTYPE html>
<html>
  <head>
             
   
    <link rel="stylesheet" href="src/estiloPedidos.css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/logocatra.png"> 
    <script src="https://kit.fontawesome.com/6b0dd32ac9.js" crossorigin="anonymous"></script>
    <script src="src/slide.js"></script>
    <title>Repostería Catra</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>

  <body>
    <main>
      <header class="barra">
          <nav class="nav_barra">
              <div class="container nav_container">
                   <a href="cliente.php"><img src="img/logocatra.png" /><h1 class="titulo">Repostería Catra</h1></a>
        
                   <div class="links">
                       <i class="fas fa-user" style="color: white"></i>
                       <a href="index.php?logout='1'" class="link">Cerrar sesión</a>
                       <i class="fas fa-shopping-cart" style="color: white"></i>
                       <a href="carrito.php" class="link">Ver carrito<a href="carrito.php" class="link" name="numItems"></a></a>
                       
                   </div>
              </div>
        </nav>
        </header>
   
  <section class="productos"> 
    <div class="contenedor">
                     
                      <article class="container-cards">
                          <div class="card">
                          <h3 class="card_title">Detalles del pedido</h3>

                          <form method="POST" enctype = "multipart/form-data" name="myForm">

                          <label>Nombre<red style="color: red">*</red><label class="otro">Apellidos<red style="color: red">*</red></label></label>

                          <input type="text" placeholder="Nombre" name="nombre" id="nombre" required/>
                          <input type="text" placeholder="Apellidos" name="apellidos" id="apellidos" required/>

                          <label >Calle<red style="color: red">*</red><label class="otroN">Número exterior<red style="color: red">*</red></label></label>

                          <input type="text" placeholder="Calle" name="calle" id="calle" required/>
                          <input type="text" placeholder="Número exterior" name="numE" id="numE" required/>

                          <label>Colonia<red style="color: red">*</red><label class="otro">Número interior</label></label>

                          <input type="text" placeholder="Colonia" name="colonia" id="colonia" required/>
                          <input type="text" placeholder="Número interior" name="numI" id="numI"/>

                          <label>Teléfono<red style="color: red">*</red></label>

                          <input type="tel" placeholder="Teléfono" name="tel" id="tel" required/>

                          <label>Correo electrónico<red style="color: red">*</red></label>

                          <input type="email" placeholder="Correo electrónico" name="email" id="email" required autocomplete="off"/>

                          <label>Indicaciones del pedido (opcional)</label>

                          <textarea name="texto" id="texto" placeholder="Indicaciones del pedido"></textarea>

                          <label>Campos con <red style="color: red">&nbsp;*&nbsp;</red> son obligatorios.</label>
                          
                            </div>

                          <div class="card-2">
                              <h3 class="card_title">Resumen del pedido</h3>
                              <table class="table">
                              <thead>
    <tr>
      <th scope="col">Productos</th>
    </tr>
  </thead>
      <tbody class="tbody" name="tbody">

       </tbody>
   </table> 

<table class="tablita" name="tablita">
       <tbody>
    <tr >
      <td><strong>Costo de Envío<strong></td>
      <td class="envio" name="envio">$20.00</td>
    </tr>
    <tr>
      <td><strong>Total</strong></td>
      <td class="tdTotal" name="tdTotal"></td>
    </tr>
  </tbody>
</table>  
<div class="otro" name="otro" style="visibility: hidden"><input type="text" class="tdTot" name="tdTot" value=""/></div>

<h3 class="card_title">Método de pago</h3>

<p class="card_text">Selecciona un método de pago:</p>
<input type="radio" name="opciones" id="efectivo" value="Pago en Efectivo" required> <label for="efectivo" style="padding: 0 5px; display: inline-flex">Pago en Efectivo </label><br>
<input type="radio" name="opciones" id="tarjeta" value="Pago con Tarjeta de crédito/débito"> <label for="tarjeta" style="padding: 0 5px; display: inline-flex">Pago con Tarjeta de crédito/débito</label><br>
<input type="radio" name="opciones" id="transferencia" value="Pago por transferencia"> <label for="transferencia" style="padding: 0 5px; display: inline-flex">Pago por Transferencia</label>

<button type="button" name="pagar" class="pagar" id="pagar"><strong>Proceder al pago</strong></button>  
<textarea style="margin: 0px 0px; width: 30px; visibility: hidden" type="text" class="prod" name="prod" value=""></textarea>

       </div>
   </div>
   <div class="overlay" id="overlay">
  <div class="popup" id="popup">
    <h1>Se realizó el pedido con éxito</h1>  
    <button type="submit" name="cerrar" class="cerrar" id="cerrar">Ok</button>
  </div>
  
  </form> 
</section>

          </main>
          <script src="src/pedidoJavas.js">    
          </script>
         <script src="src/itemsNumber.js"></script>     
        </body>
        
</html>