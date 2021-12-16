window.addEventListener("load",function(){
    
    const main = document.getElementById("main");


      fetch("CargaExamen.php?ID_Examen=1")
      .then(response => response.json())
      .then(response => {
          
        crearContenido(response);
      })

    function crearContenido(response){
        for (let valor of response){
        }
        
    }
})