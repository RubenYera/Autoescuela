window.addEventListener("load",function(){

    const campos = document.getElementsByClassName("campo");//Todos los campos de un formulario
    const letras = document.getElementsByClassName("letras");//Campos en los que solo se puede escribir letras
    const numeros = document.getElementsByClassName("numeros");//Campos en los que solo se puede escribir numeros
    const email = document.getElementsByClassName("email");//Campo de email
    const password = document.getElementsByClassName("password");//Campo de contraseña
    const btnEnviar = document.getElementById("Enviar");

    let repeticion = this.setInterval(validaFormulario,100);

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

        //Solo deja escribir números
        for(let i=0;i<numeros.length;i++){
            numeros[i].onkeydown=function(evento){
                if(isNaN(evento.key)&& evento.keyCode!=8){
                    evento.preventDefault();
                }
            }   
        }

    //Comprueba Si es un correo
    for(let i=0;i<email.length;i++){
        email[i].onkeyup=function(){
            if(email[i].value.search("@gmail.com")==-1){

                email[i].classList.add("Error");
            }else{
                email[i].classList.remove("Error");
            }
        }
    }

    //Evita copiar y pegar en la contraseña
    for(let i=0;i<password.length;i++){
        password[i].onpaste=function(ev){
            ev.preventDefault();
        }
        password[i].oncopy=function(ev){
            ev.preventDefault();
        }
        
    }
    

})