var btnAbrirMensaje = document.getElementById('submit'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarMensaje = document.getElementById('cerrar');
    correo = document.forms["myForm"]["cor_elec"];
    usuario = document.forms["myForm"]["name_us"];
    password = document.forms["myForm"]["passw"];

btnAbrirMensaje.addEventListener('click', function(){
   if((usuario.value == "") || (correo.value == "") || (password.value == "")) {
    alert("Debes rellenar todos los campos!");
    return false;
   }else{
    overlay.classList.add('active');
    popup.classList.add('active');
   }
});
btnCerrarMensaje.addEventListener('click', function(){
    overlay.classList.remove('active');
    popup.classList.remove('active');
 });

