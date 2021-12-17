window.addEventListener("load",function(){
    
    const main = document.getElementById("main");
    const paginador = document.createElement("section");
    paginador.id="paginador";
    var examen = document.createElement("section");
    examen.id="examen";

    botonesPreguntas = document.getElementsByClassName("botonPaginador");

    //Creamos el boton Anterior y Siguiente
    const btnAnterior = document.createElement("button");
    btnAnterior.id="Anterior";
    btnAnterior.innerHTML="Anterior";
    const btnSiguiente = document.createElement("button");
    btnSiguiente.id="Siguiente";
    btnSiguiente.innerHTML="Siguiente";

    //peticion de las preguntas del examen
    fetch("CargaExamen.php?ID_Examen=2")
    .then(response => response.json())
    .then(response => {
        
      crearContenido(response);
      creaPaginador();
    })

      //funcion que pinta las preguntas del examen
    function crearContenido(response){
      barajar(response);
      var z=1;
      for(let i of response){
          var section = document.createElement("section");
          section.id="Pregunta"+z;
          section.className="Pregunta";
          if(z!=1){
            section.classList.add("oculto");
          }
          var pregunta = document.createElement("section");
          pregunta.className="Enunciado";
          pregunta.innerHTML=i.enunciado;
          section.appendChild(pregunta);
         if(i.recurso!=null && i.recurso!=""){
          var img = document.createElement("img");
          img.src="data:image/jpeg;base64,"+i.recurso;
          img.width=100;
          img.height=100;
          section.appendChild(img);
         }

          var respuestas = document.createElement("p");
          barajar(i.respuestas);
          var dudosa = document.createElement("p");
          dudosa.innerHTML="<input type='radio' id='Respuesta' name='opcion"+i.id+"' value='Dudosa'>Dudosa";
          respuestas.appendChild(dudosa);
          for(let j of i.respuestas){
            var respuesta=document.createElement("p");
            respuesta.innerHTML= "<input type='radio' id='Respuesta"+j.id+"' name='opcion"+i.id+"' value='"+j.enunciado+"'>"+j.enunciado;
            respuestas.appendChild(respuesta);
          }
          
          
          section.appendChild(respuestas);
          examen.appendChild(section);  
          z++;
        }
        main.appendChild(examen);

        
    }

    function barajar(vector) {
      vector.sort(function(a,b){return Math.random()-0.5;});
    }

    //funcion para crear el paginador del examen
function creaPaginador(){

  //Añadimos el boton anterior al paginador
  paginador.appendChild(btnAnterior);
  for(let i=1;i<=examen.children.length;i++){
    const actual = document.getElementById("Pregunta"+i);

    const botonPregunta = document.createElement("button");
    botonPregunta.id="p"+i;
    botonPregunta.className="botonPaginador";
    botonPregunta.innerHTML=i;

    botonPregunta.onclick=function(){
      for(let j=0;j<examen.children.length;j++){
        examen.children[j].classList.add("oculto");
        const b = document.getElementById("p"+(j+1));
        b.classList.remove("actual");
      }
      this.classList.add("actual");
      actual.classList.remove("oculto");
    }
    paginador.appendChild(botonPregunta); 
  }

  //Controlamos el onclick del boton Anterior
  btnAnterior.onclick=function(){
    for(let i=0;i<botonesPreguntas.length;i++){
      // if(respondida(i+1)){
      //   botonesPreguntas[i].style.backgroundColor="red";
      // }
    }
  }

  //Añadimos el boton de Siguiente
  paginador.appendChild(btnSiguiente);
  main.appendChild(paginador);   
}

  // function respondida(n){
  //   //cogemos los radios
  
  // }
})