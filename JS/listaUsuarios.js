window.addEventListener("load",function(){
  
    
  const contenedor = document.getElementById("contenedor");
  const table = document.getElementById("usuarios");
  
  pideUsuarios();

  function pideUsuarios(){
    fetch("CargaUsuarios.php",{
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
      const td5 = document.createElement("td");
      tr.setAttribute("id","Usuario"+i.id);
      tr.setAttribute("name","Usuario"+i.id);
      tr.setAttribute("class","Usuario");
      
      td1.innerHTML = i.nombre+" "+i.apellidos;
      tr.appendChild(td1);
      td2.innerHTML = i.rol;
      tr.appendChild(td2);
      td3.innerHTML = "-";
      tr.appendChild(td3);
      if(i.activo==1){
        td4.innerHTML = "Si";
      }else{
        td4.innerHTML = "No";
      }
      tr.appendChild(td4);
      td5.innerHTML = "Editar Desactivar Borrar";
      tr.appendChild(td5);
      table.appendChild(tr);
    }
  }
})