window.addEventListener("load",function(){

    const btnCargar=document.getElementById("CargarPreguntas");
    const btnGuardar=document.getElementById("Guardar");
    const CajaPreguntas=document.getElementById("Caja_preguntas");
    const Caja_Preguntas_Examen=document.getElementById("Caja_Preguntas_Examen");
    const divs=CajaPreguntas.getElementsByClassName("pregunta");

    // for(let i=0;i<divs.length;i++){
    //     divs[i].ondragenter=function(ev){
    //         if ( ev.target.className == "pregunta" ) {
    //             ev.preventDefault();
    //             ev.target.style.border = "3px dotted red";
    //         }
    //     }
    // }
    
    Caja_Preguntas_Examen.ondragstart=function(ev){
        ev.dataTransfer.setData("Text", ev.target.id);
    }
    Caja_Preguntas_Examen.ondragover=function(ev){
        ev.preventDefault();
    }

    CajaPreguntas.ondragstart=function(ev){
        ev.dataTransfer.setData("Text", ev.target.id);
    }
    CajaPreguntas.ondragover=function(ev){
        ev.preventDefault();
    }

    Caja_Preguntas_Examen.ondrop=function(ev){
        ev.preventDefault();
        const id=ev.dataTransfer.getData("Text");
        if ( ev.target.className == "pregunta" ) {
            ev.target.parentElement.appendChild(document.getElementById(id));
        }else{
            ev.target.appendChild(document.getElementById(id));
        }
    }

    CajaPreguntas.ondrop=function(ev){
        ev.preventDefault();
        const id=ev.dataTransfer.getData("Text");
        if ( ev.target.className == "pregunta" ) {
            ev.target.parentElement.appendChild(document.getElementById(id));
        }else{
            ev.target.appendChild(document.getElementById(id));
        }
    }


    btnCargar.onclick=function(){
        PedirPreguntas();
    }
    btnGuardar.onclick=function(){
        preguntas = ObtienePreguntas();
        var data = new FormData();
        fetch("Examen_Preguntas.js",{
            method:"POST"
        }).then(response => response.json())
          .catch(error=>console.error("Error","error"))
          .then(response=> {
            crearContenido(response);
          })
    }

    // function PedirPreguntas(){
    //     const ajax = new XMLHttpRequest();
    //     ajax.onreadystatechange=function(){
    //         if(ajax.readyState==4 && ajax.status==200){
    //             var objJavascript = JSON.parse(ajax.responseText);
    //             for(let i=0;i<objJavascript.length;i++){
    //                 var div = document.createElement("div");
    //                 div.innerHTML = objJavascript[i].id+" "+objJavascript[i].Nombre;
    //                 div.className="pregunta";
    //                 CajaPreguntas.appendChild(div);
    //             }
    //         }
    //     }
    //     ajax.open("POST", "../Include/Examen_Pregunta.php");
    //     ajax.send();
    // }

    function PedirPreguntas() {
        fetch("CargaPreguntas.php",{
            method:"POST"
        }).then(response => response.json())
          .catch(error=>console.error("Error","error"))
          .then(response=> {
            crearContenido(response);
          })
        // const ajax = new XMLHttpRequest();
        // ajax.onreadystatechange=function(){
        //     if(ajax.readyState==4 && ajax.status==200){
        //         var objJavascript=JSON.parse(ajax.responseText);
        //         if(objJavascript.length>0){
        //             for(let i=0;i<objJavascript.length;i++){
        //                 var div=crearContenido(objJavascript[i]);
        //                 CajaPreguntas.appendChild(div);
        //                 // var br = document.createElement("br")
        //                 // contenedor.appendChild(br);
        //                 CajaPreguntas.scrollTop=contenedor.scrollHeight;
        //             }
        //         }
        //     }
        // }

        // ajax.open("GET", "../Include/CargaPreguntas.php" );
        // ajax.send();
    }

    function crearContenido(fila) {
        for(let i of fila){
            const div = document.createElement("div");
            div.innerHTML=i.id+"  "+i.enunciado;
            div.setAttribute("id","pregunta"+i.id);
            div.setAttribute("name","pregunta"+i.id);
            div.setAttribute("class","pregunta");
            div.setAttribute("draggable","true");
            CajaPreguntas.appendChild(div);
        }
    }

    function ObtienePreguntas(){
        var preguntas = Caja_Preguntas_Examen.children;
        var ids = [];
        for(let i=0;i<preguntas.length;i++){
            var id = preguntas.getAttribute("id").substr(9);
            ids.push(id);
            return ids;
        }
    }


//     function PedirExamenes() {
//         const ajax = new XMLHttpRequest();
//         ajax.onreadystatechange=function(){
//             if(ajax.readyState==4 && ajax.status==200){
//                 var respuesta=JSON.parse(ajax.responseText);
//                 if(respuesta.mensaje.length>0){
//                     for(let i=0;i<respuesta.mensaje.length;i++){
//                         var div=crearContenido(respuesta.mensaje[i],usuario.value);
//                         contenedor.appendChild(div);
//                         // var br = document.createElement("br")
//                         // contenedor.appendChild(br);
//                         contenedor.scrollTop=contenedor.scrollHeight;
//                     }
//                 }
//                 ultimo=respuesta.ultimo;
//             }
//         }

//         ajax.open("GET", "Pedir.php?ultimo="+ultimo );
//         ajax.send();
//     }
 });