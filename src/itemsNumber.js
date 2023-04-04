
    var piloto = JSON.parse(localStorage.getItem('carrito'));
    const numItems = document.getElementsByName('numItems')[0];
    var cero = 0;
    if (piloto !== null){
        var tamaño = piloto.length;
        numItems.innerHTML = `(${tamaño})`;
    } else {
        numItems.innerHTML = `(${cero})`;
    }
