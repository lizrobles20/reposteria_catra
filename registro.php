<?php
session_start();
//Conectar a la base de datos:
$db = mysqli_connect('localhost', 'root', '', 'catrabd');

if (isset($_POST['cerrar'])){
  $file_nombreus = $_POST['name_us'];
  $file_passw = $_POST['passw'];
  $file_email = $_POST['cor_elec'];
  if(empty($file_nombreus)){}else{
    $sql= "INSERT into usuarios (contra, nombre_user, tipo_user, email) VALUES('$file_passw','$file_nombreus', 'cliente', '$file_email')";
    mysqli_query($db,$sql);
    header("location: index.php");
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="src/estiloRegistro.css"/>
    <link rel="shortcut icon" href="img/logocatra.png"> 
    <title>Repostería Catra</title>
    <meta charset="UTF-8" />
  </head>

  <body>
<form method="POST" enctype = "multipart/form-data" name="myForm">
      <div class="icon">
      <a href="index.php" class="icon"><img src="img/logocatra.png"></a>
      </div>
     <h1>Regístrate</h1>
       <div class="grupo">
         <input type="email" name="cor_elec" id="cor_elec" required>
         <label for="cor_elec">Correo electrónico</label>
       </div>
       <div class="grupo">
         <input type="text" name="name_us" id="name_us" required>
         <label for="name_us">Nombre de usuario</label>
       </div>
       <div class="grupo">
         <input type="password" name="passw" id="passw" required>
         <label for="passw">Contraseña</label>
       </div>
       <button type="button" name="submit" id="submit">Registrar</button>
       <div class="registrar">
      <label class="registrado" for="user">¿Ya estás registrado?</label>
      <a href="index.php" class="link">Ingresa aquí</a>
</div>
<div class="overlay" id="overlay">
  <div class="popup" id="popup">
    <h1>Se registró con éxito</h1>  
    <button type="submit" name="cerrar" class="cerrar" id="cerrar">Ok</button>
  </div>
  </form>
</div>
<script src="src/mensajeRegistro.js"></script>
  </body>
</html>
