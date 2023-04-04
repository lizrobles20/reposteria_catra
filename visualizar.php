<?php
include('process.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}
if (!isAdmin()) {
  session_destroy();
  $_SESSION['msg'] = "You must log in first";
  header('location: ./index.php');
}
global $db;
$id = $_GET['id'];
$conexion = "SELECT * FROM `pedidos`, `detalles`, `usuarios` WHERE pedidos.id_pedido = $id AND pedidos.id_detalles = detalles.id_detalles AND pedidos.id_usuario = usuarios.id_usuario";
$result = mysqli_query($db, $conexion) or die(mysqli_error($db));

?>

<!DOCTYPE html>
<html>
  <head>
    
    <link rel="stylesheet" href="src/historial.css" />  
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
                   <a href="historial.php"><img src="img/logocatra.png" /><h1 class="titulo">Repostería Catra</h1></a>
        
                   <div class="links">
                       <i class="fas fa-user" style="color: white"></i>
                       <a href="index.php?logout='1'" class="link">Cerrar sesión</a>
                       <i class="fas fa-shopping-cart" style="color: white"></i>
                       <a href="historial.php" class="link">Historial de pedidos</a>
                   </div>
              </div>
        </nav>
        </header>
   
  <section class="productos"> 
    <div class="contenedor">
    <div id="content-search">
    <h2><strong>Pedido <?php echo $id ?></h2>
    <div class="content-table">
        <table id="tabla" class="txtg">
          <tbody>
              <?php
              while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              ?>
            <tr>
              <td><strong>Pedido <?php echo $row['id_pedido'] ?></strong></td>
            </tr>
            <tr>
              <td><strong>Usuario del pedido: </strong><?php echo $row['nombre_user'] ?></td>
            </tr>
            <tr>
              <td><strong>Productos y cantidades</strong></td>
            </tr>
            <tr>
              <td><?php echo $row['producto'] ?></td>
            </tr>
            <tr>
              <td><strong>Detalles del cliente</strong></td>
            </tr>
            <tr>
              <td><strong>Nombre: </strong><?php echo $row['nombre_cliente'] ?>&nbsp;&nbsp;&nbsp; <strong>Apellidos: </strong><?php echo $row['apellidos_cliente'] ?></td>
            </tr>
            <tr>
              <td><strong>Teléfono: </strong><?php echo $row['telefono'] ?> </td>
            </tr>
             <tr>
              <td><strong>Email: </strong><?php echo $row['correo'] ?> </td>
            </tr>
            <tr>
              <td><strong>Dirección de entrega</strong></td>
            </tr>
            <tr>
              <td><strong>Calle: </strong><?php echo $row['calle'] ?></td>
            </tr>
            <tr>
              <td><strong>Número exterior: </strong><?php echo $row['numExt'] ?></td>
            </tr>
            <tr>
              <td><strong>Colonia: </strong><?php echo $row['colonia'] ?></td>
            </tr>
            <tr>
              <td><strong>Número interior: </strong><?php echo $row['numInt'] ?></td>
            </tr>
            <tr>
              <td><strong>Indicaciones del pedido: </strong><?php echo $row['indicaciones'] ?></td>
            </tr>
            <tr>
              <td><strong>Método de pago: </strong> <?php echo $row['metodoPago'] ?></td>
            </tr>
            <tr style="text-align: right">
              <td><strong>Total del pedido: </strong>$<?php echo $row['total'] ?>.00</td>
            </tr>
            <?php
              }
              ?>
          </tbody>
        </table>
      </div>
      </div>
    
   </div>
   
</section>
          </main>
             
        </body>
</html>