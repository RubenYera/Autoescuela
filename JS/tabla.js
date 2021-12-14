window.addEventListener("load",function(){

    const tabla = document.getElementById("tabla");

    const ths = tabla.firstChild.firstChild.children;

    for(let i=0;i<ths.length;i++){
        ths[i].ordenacion=1;
        ths[i].onclick = ordenarTabla(i);
    }

    function ordenarTabla(i){
        var vector=[];
        var tBody=ths[i].parentNode.parentNode.nextElementSibling;
        var filas=tBody.children;
        for (let j=0;j<filas.length;j++){
            vector.push(filas[j]);
        }
        vector.sort(comparaCadena);

        function comparaCadena(a,b){
            return ths[i].ordenacion * a.children[0].innerHTML.localeCompare(b.children[0].innerHTML)
        }

        ths[i].ordenacion*=-1;
        for (let j=0;j<vector.length;j++){
            tBody.appendChild(vector[j]);
        }
    }
})