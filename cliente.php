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
    <link rel="stylesheet" type="text/css" href="src/estilos.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <script src="https://kit.fontawesome.com/6b0dd32ac9.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/logocatra.png"> 
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
        <div class="fondo" style="background-image: url('img/bgrepos.jpg'); box-sizing: border-box;">
        <br class="espacio"></br><br class="espacio"></br><br class="espacio"></br>
        <div class="texto_fondo"><img src="img/logocatra.png" />
          <?php  if (isset($_SESSION['user'])) : ?>
           <h1><strong>Bienvenido/a </strong><?php echo $_SESSION['user']['nombre_user']; ?></h1>
           <?php endif ?>
           </div>

</div>
  <section class="productos"> 
    <div class="contenedor">
                     <h2 class="subtitulo">Nuestros productos.</h2>
                      <p class="minisup">Elige entre nuestros productos hechos con calidad y con el mejor sabor.</p>

                      <article class="container-cards">
                          <div class="card">
                              <h3 class="card_title">Pasteles</h3>
                              <img src="img/pastelitos.jpg" class="card_img">
                              <a href="pasteles.php" class="card_button"> Selecciona las opciones</a>
                          </div>
                        <div class="card">
                              <h4 class="card_title">Brownies</h4>
                              <img src="img/brownies.jpg" class="card_img">
                              <a href="brownies.php" class="card_button"> Selecciona las opciones</a>
                        </div>
                        <div class="card">
                              <h4 class="card_title">Galletas</h4>
                              <img src="img/galletas.jpg" class="card_img">
                              <a href="galletas.php" class="card_button"> Selecciona las opciones</a>
                        </div>

   </div>
</section>
          </main>
          <script src="src/itemsNumber.js"></script>    
        </body>
</html>
    
        
        