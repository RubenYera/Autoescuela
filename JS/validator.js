window.addEventListener("load",function(){

    const campos = document.getElementsByClassName("campo");//Todos los campos de un formulario
    const letras = document.getElementsByClassName("letras");//Campos en los que solo se puede escribir letras
    const email = document.getElementsByClassName("email");//Campo de email
    const btnEnviar = document.getElementById("Enviar");

    // let repeticion = this.setInterval(validaFormulario,100);

    //Mira si está vacío algún campo
    function validaFormulario(){
        for(let i=0;i<campos.length;i++){
            if(campos[i].value.length==0){
                
                campos[i].classList.add("Error");
            }else{
                campos[i].classList.remove("Error");
            }
        }  
    }

    //No deja escribir números
    for(let i=0;i<letras.length;i++){
        letras[i].onkeydown=function(evento){
            if(!isNaN(evento.key)){
                evento.preventDefault();
            }
        }   
    }

    for(let i=0;i<email.length;i++){
        email[i].onfocusout=function(){
            if(email[i].value.search("@gmail.com")==-1){

                email[i].classList.add("Error");
            }else{
                email[i].classList.remove("Error");
            }
        }
    }

})