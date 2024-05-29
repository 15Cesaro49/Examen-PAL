function imprimirDatos() {
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var color = document.getElementById('color').value;
    var numero_bastidor = document.getElementById('numero_bastidor').value;
    var velocidad_actual = document.getElementById('velocidad_actual').value;
    
    var datos = "Marca: " + marca + "\nModelo: " + modelo + "\nColor: " + color + 
                "\nNúmero de bastidor: " + numero_bastidor + 
                "\nLa velocidad actual es de " + velocidad_actual + " km/h";
    
    var blob = new Blob([datos], { type: "text/plain;charset=utf-8" });
    var link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "lodigitadopor_Apellido.txt";
    link.click();
}

