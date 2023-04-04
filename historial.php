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
$id = $_SESSION['user']['id_usuario'];
$sql="SELECT * FROM pedidos ORDER BY id_pedido DESC";
$result = filtrar($sql);
function filtrar($sql){
  global $db;
  $result_filtrado = mysqli_query($db, $sql);
  return $result_filtrado;
}
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
    <h2><strong>Historial de pedidos</h2>
    <div class="content-table">
        <table id="tabla">
          <tbody>
            <?php
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><a href="visualizar.php?id=<?php echo $mostrar['id_pedido'] ?>">Pedido <?php echo $mostrar['id_pedido'] ?></a></td>
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