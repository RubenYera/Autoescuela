window.addEventListener("load",function(){

    PedirPreguntas();
    const btnGuardar=document.getElementById("Guardar");
    const CajaPreguntas=document.getElementById("Caja_preguntas");
    const Caja_Preguntas_Examen=document.getElementById("Caja_Preguntas_Examen");
    const divs=CajaPreguntas.children;
    const filtro=document.getElementById("filtro");
    const filtro2 = document.getElementById("filtro2");


    for(let i=0;i<divs.length;i++){
        divs[i].onclick=function(){
            divs[i].classList.toggle("oculto");
        }
    }

    //controlamos el arrastrar y soltar de las preguntas
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

    //mandamos el examen para guardarlo en la BD
    btnGuardar.onclick=function(){
        var preguntas = ObtienePreguntas();
        var data = new FormData();
        var duracion = document.getElementById("Duracion");
        var descripcion = document.getElementById("Descripcion");
        data.append("Duracion",duracion.value);
        data.append("Descripcion",descripcion.value);
        data.append("preguntas",preguntas);
        fetch("../Include/Guarda_Examen.php",{
            method:"POST",
            body:data
        })
            .then(response => response.json())
            .catch(error=>console.log("Error",error))
            .then(response=> {
               if(response.respuesta){
                   alert("Exito");
               }else{
                   alert("Fallo");
               }
            })
    }

    //filtro de preguntas
    filtro.onkeyup=function(){
        const divs=CajaPreguntas.getElementsByTagName("div");
        for(let i=0;i<divs.length;i++){
            divs[i].classList.remove("marcado");
            if(divs[i].innerHTML.indexOf(filtro.value)<0)
                divs[i].classList.add("oculto");
            else
                divs[i].classList.remove("oculto");
         }
    }

    //filtro de preguntas del examen
    filtro2.onkeyup=function(){
        const divs=Caja_Preguntas_Examen.getElementsByTagName("div");
        for(let i=0;i<divs.length;i++){
            divs[i].classList.remove("marcado");
            if(divs[i].innerHTML.indexOf(filtro2.value)<0)
                divs[i].classList.add("oculto");
            else
                divs[i].classList.remove("oculto");
         }
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
          .catch(error=>console.error("Error",error))
          .then(response => {
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
            var id = preguntas[i].getAttribute("id").substr(8);
            ids.push(id);
            
        }
        return ids;
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