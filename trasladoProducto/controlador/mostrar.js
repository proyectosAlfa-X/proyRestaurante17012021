

function mostrarContrasena(){
      var tipo = document.getElementById("clave");
      if(tipo.type == "password"){
          tipo.type = "text";
           
      }else{
          tipo.type = "password";
           
      }
  }




  /*

function mostrarContrasena(){
    var tipo= document.getElementById('password');
    var t=document.getElementById('btns');
    if(tipo.type=="password"){
      tipo.type="text";
      t.value="OCULTAR"

    }else{
      tipo.type="password";
      t.value="VER";
    }

  }
  function mayusP(e) {
    e.value = e.value.toUpperCase();
    var t=document.getElementById('btns');
    t.style.display  ='block';
   // $(".desbloquea").removeAttr("disabled");
   // pt=document.getElementById('password');

var cadena =document.getElementById('password').value;
var cadena1 =document.getElementById('password');
var t=document.getElementById('btns');
var numeroLetras = cadena.length;
//alert(numeroLetras);

    
/*pt.addEventListener('keydown', function(event) { 
            const key = event.key; 
            
            if (key === "Backspace" || key === "Delete") { 
                t.style.display  ='none';
            } else

t.style.display  ='block';
            
        }); */
 /*       if(numeroLetras===0) {
          t.style.display  ='none';
           cadena1.type="password";
      t.value="VER";
        }
    
}
function mayus(e) {
    e.value = e.value.toUpperCase();
    
}*/