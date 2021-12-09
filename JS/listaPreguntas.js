window.addEventListener("load",function(){
  
    
    const contenedor = document.getElementById("contenedor");
    const table = document.getElementById("preguntas");
    
    pidePreguntas();
  
    function pidePreguntas(){
      fetch("CargaPreguntas.php",{
        method:"POST"
    }).then(response => response.json())
      .catch(error =>console.error("Error",error))
      .then(response => {
        crearContenido(response);
      })
    }
  
    function crearContenido(fila){
      for(let i of fila){
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        const td2 = document.createElement("td");
        const td3 = document.createElement("td");
        const td4 = document.createElement("td");
        tr.setAttribute("id","Pregunta"+i.id);
        tr.setAttribute("name","Pregunta"+i.id);
        tr.setAttribute("class","Pregunta");
        
        td1.innerHTML = i.id;
        tr.appendChild(td1);
        td2.innerHTML = i.enunciado;
        tr.appendChild(td2);
        td3.innerHTML = i.Tematica.nombre;
        tr.appendChild(td3);
        td4.innerHTML = "Editar Desactivar Borrar";
        tr.appendChild(td4);
        table.appendChild(tr);
      }
    }
  })