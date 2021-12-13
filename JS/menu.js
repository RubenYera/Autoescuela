window.addEventListener("load",function(){
    const imgPerfil = document.getElementById("perfil");
    const menuUsuario = document.getElementById("menuUsuario");
    imgPerfil.onclick=function(ev){
        ev.preventDefault();
        if(menuUsuario.className=="oculto"){
            menuUsuario.className="perfil";
        }else{
            menuUsuario.className="oculto";
        }
    }
})