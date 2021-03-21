document.getElementById("imagenEliminare").onchange = function(m) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(m.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview11 = document.getElementById('previewEliminare'),
            image11 = document.createElement('img');
            image11.style.width= '186px';
            image11.style.height= '194px';


    image11.src = reader.result;
    

    preview11.innerHTML = '';
    preview11.append(image11);
  };
}


