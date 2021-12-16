window.addEventListener("load",function(){
    
    const main = document.getElementById("main");


      fetch("CargaExamen.php?ID_Examen=1")
      .then(response => response.json())
      .then(response => {
          
        crearContenido(response);
      })

    function crearContenido(response){
      for(let i of response){
          var section = document.createElement("section");
          section.id="Pregunta"+i.id;
          section.className="Pregunta";
          var pregunta = document.createElement("section");
          pregunta.className="Enunciado";
          pregunta.innerHTML=i.enunciado;
          section.appendChild(pregunta);
          var respuestas = document.createElement("p");
          for(let j of i.respuestas){
            var respuesta=document.createElement("p");
            respuesta.innerHTML= j.enunciado+"<input type='radio'";
            respuestas.appendChild(respuesta);
          }
          section.appendChild(respuestas);
          main.appendChild(section);
        }
        
    }
})