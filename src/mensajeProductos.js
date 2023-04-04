var btnAbrirMensaje = document.getElementById('submit'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarMensaje = document.getElementById('cerrar');
    
btnAbrirMensaje.addEventListener('click', function(e){
    const button = e.target
    const item = button.closest('.card')
    const itemProducto = item.querySelector('.sabor');
    let precio = itemProducto.options[itemProducto.selectedIndex].value;
    if(precio == "$$$"){
        
    }else{
    overlay.classList.add('active');
    popup.classList.add('active');
    }
});
btnCerrarMensaje.addEventListener('click', function(){
    overlay.classList.remove('active');
    popup.classList.remove('active');
    window.location.reload();
 });
