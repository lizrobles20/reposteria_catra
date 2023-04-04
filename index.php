<?php include('process.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="src/estiloIndex.css"/>
    <link rel="shortcut icon" href="img/logocatra.png"> 
    <title>Repostería Catra</title>
    <meta charset="UTF-8" />
  </head>

  <body>

  <form method="POST" action="process.php">
    <?php echo display_error(); ?>
      <div class="icon">
      <img src="img/logocatra.png">
      </div>
      <h1>Iniciar sesión</h1>
      <div class="formcontainer">
      <div class="container" >
        <label for="user"><strong>Nombre de usuario</strong></label>
        <input type="text" placeholder="Ingrese su nombre de usuario" name="user" required/>
        <label for="pass"><strong>Contraseña</strong></label>
        <input type="password" placeholder="Ingrese su contraseña" name="pass" required/>
      </div>
      <button type="submit" name="login_btn" ><strong>Ingresar</strong></button>
      
      </div>
      <div class="registrar">
      <label for="user">¿No tienes cuenta registrada?</label>
      <a href="registro.php" class="link">Registrate aquí</a>
</div>
    </form>
  </body>
</html>