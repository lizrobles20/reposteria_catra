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

?>

<!DOCTYPE html>
<html>
  <head>
   
    <link rel="stylesheet" href="src/itemsCarrito.css" />  

    <link rel="shortcut icon" href="img/logocatra.png"> 
    <script src="https://kit.fontawesome.com/6b0dd32ac9.js" crossorigin="anonymous"></script>
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

    <table class="table">
  <thead>
    <tr>
      <th scope="col" >#</th>
      <th scope="col">Productos</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody class="tbody" name="tbody">
     
  </tbody>
</table> 
&nbsp;
<button type="submit" name="vaciar" class="vaciar" style="margin-left:70%"><strong>Vaciar carrito</strong></button>

<table class="tablita" style="margin-left:70%">
  <tbody>
    <tr >
      <td class="tdSub" name="tdSub"><strong>Subtotal</strong></td>
      <td class="itemCartSub" name="itemCartSub"></td>
    </tr>
    <tr >
      <td class="" name="">Costo de Envío</td>
      <td class="envio" name="envio">$20.00</td>
    </tr>
    <tr>
      <td><strong>Total</strong></td>
      <td class="tdTotal" name="tdTotal"></td>
    </tr>
  </tbody>
</table>   
&nbsp;
<a href="pedido.php"><button type="submit" name="proceder" class="proceder" style="margin-left:70%"><strong>Realizar pedido</strong></button></a>
                      
   </div>
   <div class="overlay" id="overlay">
  <div class="popup" id="popup">
    <h1>No hay productos en el carrito</h1>  
    <a href="cliente.php"><button type="submit" name="cerrar" class="cerrar" id="cerrar">Ok</button></a>
  </div>
</section>
          </main>
          <script src="src/cartTabla.js">    
          </script>
          <script src="src/itemsNumber.js"></script>     
        </body>
</html>