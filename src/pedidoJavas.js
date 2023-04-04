var piloto = JSON.parse(localStorage.getItem('carrito'));
var prueba = JSON.stringify(piloto);
const items = document.querySelector('.tbody');
const env = document.querySelector('.envio').textContent
const tot = document.querySelector('.tdTotal')
const otro = document.querySelector('.tdTot')
const prod = document.querySelector('.prod')

nombreCliente = document.forms["myForm"]["nombre"];
apellidoCliente = document.forms["myForm"]["apellidos"];
calle = document.forms["myForm"]["calle"];
numE = document.forms["myForm"]["numE"];
colonia = document.forms["myForm"]["colonia"];
tel = document.forms["myForm"]["tel"];
email = document.forms["myForm"]["email"];
opciones = document.forms["myForm"]["opciones"];

let element;

renderCarrito();

function renderCarrito(){
items.innerHTML = ''
piloto.forEach(element => {
    const tr = document.createElement('tr')
    const Content = `   
            <td class="table__productos">${element.producto} x${element.canti}</td>     
    `
    tr.innerHTML = Content;
    items.append(tr);
    texto = prueba.replace(/{/g, '');
    texto1 = texto.replace("[",'');
    texto2 = texto1.replace("]",'');
    texto3 = texto2.replace(/}/g, '');
    texto4 = texto3.replace(/"canti"/g,' Cantidad');
    texto5 = texto4.replace(/"price"/g,' Precio');
    texto6 = texto5.replace(/"producto"/g,' Producto');
    prod.value = texto6;
  });
  }

  let total = 0;
  piloto.forEach(element =>{
      total+=element.canti*Number(element.price.replace("$",''));
  })
  const num = Number(env.replace("$",''));
  tot.innerHTML = `$${total+=num}.00`;
  otro.value = `${total}`;
  


  var btnAbrirMensaje = document.getElementById('pagar'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarMensaje = document.getElementById('cerrar');
    

btnAbrirMensaje.addEventListener('click', function(){
    if((nombreCliente.value == "") || (apellidoCliente.value == "") || (calle.value == "") || (numE.value == "") 
    || (colonia.value == "") || (tel.value == "") || (email.value == "") || (opciones.value == "")) {
        alert("Rellena o selecciona los campos faltantes.");
        return false;
       }else{
    overlay.classList.add('active');
    popup.classList.add('active');
       }
});
btnCerrarMensaje.addEventListener('click', function(){
    overlay.classList.remove('active');
    popup.classList.remove('active');
    localStorage.clear();
 });

 


