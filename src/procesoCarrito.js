const Clickbutton = document.getElementsByName('añadir')[0];
let btn;
let carrito = [];

Clickbutton.addEventListener("click", addToCarritoItem, false);

function addToCarritoItem(e){
    const button = e.target
    const item = button.closest('.card')
    const itemProducto = item.querySelector('.sabor');
    let product = itemProducto.options[itemProducto.selectedIndex].text;
    let precio = itemProducto.options[itemProducto.selectedIndex].value;
    let cantidad = item.querySelector('.cantidadProducto').value;
    let num = Number(cantidad);
    if(precio !== '$$$'){
    const newItem = {
         producto: product,
         price: precio,
         canti: num,
    }
    addItemCarrito(newItem)
  }else{
    alert("Selecciona un producto");
    return false;
  }
}

function addItemCarrito(newItem){
  const cantidad = document.querySelector('.cantidadProducto').value;
  const num = Number(cantidad);
  for(let i =0; i < carrito.length ; i++){
    if(carrito[i].producto.trim() === newItem.producto.trim()){
      carrito[i].canti+=num;
      CarritoTotal();
      return null;
    }
  }
    carrito.push(newItem)
    renderCarrito()
}
function renderCarrito(){
  console.log(carrito)
  CarritoTotal();
}

function CarritoTotal(){
  let total = 0;
  const itemCartTotal = document.getElementsByName('itemCartTotal');
  carrito.forEach((item) => {
    const precio = Number(item.price.replace("$",''))
    total+=precio*item.canti;
  })
  itemCartTotal.innerHTML = `Total $${total}`;
  addLocalStorage();
}

function addLocalStorage(){
  localStorage.setItem('carrito', JSON.stringify(carrito))
}

window.onload = function(){
  const storage = JSON.parse(localStorage.getItem('carrito'));
  if(storage){
    carrito = storage;
    renderCarrito();
  }
}
