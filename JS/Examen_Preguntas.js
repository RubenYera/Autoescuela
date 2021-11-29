window.addEventListener("load",function(){

    const btnCargar=document.getElementById("Cargar Preguntas");
    const CajaPreguntas=document.getElementById("Caja_preguntas");
    const Caja_Preguntas_Examen=document.getElementById("Caja_Preguntas_Examen");
    const divs=CajaPreguntas.getElementsByTagName("div");

    // for(let i=0;i<this.dispatchEvent.length;i++){
    //     divs[i].ondragstart=function(ev){
    //         ev.dataTransfer.setData("Text", ev.target.id);
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
        ev.target.appendChild(document.getElementById(id));
    }

    CajaPreguntas.ondrop=function(ev){
        ev.preventDefault();
        const id=ev.dataTransfer.getData("Text");
        ev.target.appendChild(document.getElementById(id));
    }


    // btnCargar.onClick=function(){

    // }

    function PedirExamenes() {
        const ajax = new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4 && ajax.status==200){
                var respuesta=JSON.parse(ajax.responseText);
                if(respuesta.mensaje.length>0){
                    for(let i=0;i<respuesta.mensaje.length;i++){
                        var div=crearContenido(respuesta.mensaje[i],usuario.value);
                        contenedor.appendChild(div);
                        // var br = document.createElement("br")
                        // contenedor.appendChild(br);
                        contenedor.scrollTop=contenedor.scrollHeight;
                    }
                }
                ultimo=respuesta.ultimo;
            }
        }

        ajax.open("GET", "Pedir.php?ultimo="+ultimo );
        ajax.send();
    }
});