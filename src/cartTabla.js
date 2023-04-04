var piloto = JSON.parse(localStorage.getItem('carrito'));
console.log(piloto);
const tbody = document.querySelector('.tbody')
const sub = document.querySelector('.itemCartSub')
const env = document.querySelector('.envio').textContent
const tot = document.querySelector('.tdTotal')
tab = document.querySelector('.tablita')
boton = document.querySelector('.proceder')
const VaciarTodo = document.querySelector('.vaciar');
let element;
let e;

    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarMensaje = document.getElementById('cerrar');


    if ((localStorage.getItem('carrito') == null) || (piloto.length == 0)){
      boton.classList.add('active');
      tab.classList.add('active');
      overlay.classList.add('active');
      popup.classList.add('active');
    }
    btnCerrarMensaje.addEventListener('click', function(){
      overlay.classList.remove('active');
      popup.classList.remove('active');
   });

renderCarrito();

function renderCarrito(){
tbody.innerHTML = ''
piloto.forEach(element => {
    const tr = document.createElement('tr')
    const Content = `   
            <th scope="row">1</th>
            <td class="table__productos">${element.producto}</td>
            <td class="table__cantidad">${element.canti}</td>
            <td class="table__price">${element.price}</td>
            <td class="table__subtotal">$${element.canti*Number(element.price.replace("$",''))}.00</td>
            <td class="table__eliminar"><button type="submit" name="eliminar" class="eliminar"
            style="width:50%"><strong>x</strong></button></td>
    `
    tr.innerHTML = Content;
    tbody.append(tr);
    tr.querySelector(".eliminar").addEventListener('click', removeItemCarrito) 
  });
  }

  let total = 0;
  piloto.forEach(element =>{
      total+=element.canti*Number(element.price.replace("$",''));
  })
  sub.innerHTML = `$${total}.00`;

  const num = Number(env.replace("$",''));
  tot.innerHTML = `$${total+=num}.00`;


 function removeItemCarrito(e){
    const buttonDelete = e.target;
    const tr = buttonDelete.closest(".tbody tr");
    const title = tr.querySelector('.table__productos').textContent;
    for(let i=0; i<piloto.length ; i++){
    if(piloto[i].producto.trim() === title.trim()){
      piloto.splice(i, 1)
    }
  }
  tr.remove();
  localStorage.setItem('carrito', JSON.stringify(piloto))
  window.location.reload();
  }

  
  VaciarTodo.addEventListener('click', vaciarCarrito);

  function vaciarCarrito(){
    localStorage.clear();
    window.location.reload();
  }




