<?php
session_start();
//Conectar a la base de datos:
$db = mysqli_connect('localhost', 'root', '', 'catrabd');
//Declaración de variables:
$username = "";
$password = "";
$errors   = array(); 

//Llamar a la función login si cliquea al boton login_btn
if (isset($_POST['login_btn'])) {
  login();
}

// return user array from their id
function getUserById($id){
  global $db;
  $query = "SELECT * FROM usuarios WHERE id_usuario=" . $id;
  $result = mysqli_query($db, $query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

// escape string
function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
} 
//Revisar si estas logeado
function isLoggedIn()
{
  if (isset($_SESSION['user'])) {
    return true;
  }else{
    return false;
  }
}
// Cierra la sesión del usuario si cliqueas el boton logout
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: index.php");
}
// LOGIN USER
function login(){
  global $db, $username, $errors;

  // grap form values
  $username = e($_POST['user']);
  $password = e($_POST['pass']);

  // make sure form is filled properly
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // attempt login if no errors on form
  if (count($errors) == 0) {

    $query = "SELECT * FROM usuarios WHERE nombre_user='$username' AND contra='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { // user found
      // check if user is admin or user
      $logged_in_user = mysqli_fetch_assoc($results);
      if ($logged_in_user['tipo_user'] == 'administrador') {
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: historial.php');
      }else{
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        header('location: cliente.php');
      }
    }else {
      header('location: index.php');
      array_push($errors, "Wrong username/password combination");
    }
  }
}
function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['tipo_user'] == 'administrador' ) {
    return true;
  }else{
    return false;
  }
}