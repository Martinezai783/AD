const lista = document.getElementById('lista');
const tucarta = document.getElementById('tucarta');
const confirmar = document.getElementById('boton-confirmar');

Sortable.create(lista, {
    animation: 200,
    filter: '.carta',
    group: {name: "timeline"},
    store: {
        //Para guardar el orden de la lista
        set: (sortable) => {
            const orden = sortable.toArray();
            //console.log(orden);
            localStorage.setItem(sortable.options.group.name, orden.join('-'));
        },

        // Obtenemos el orden de la lista
        get: (sortable) => {
            const orden = localStorage.getItem(sortable.options.group.name);
            return orden ? orden.split('-').sort() : [] ;
        }
    }
});

Sortable.create(tucarta, {
    animation: 200,

    group: {name:"timeline"},

    onRemove: (evento) => { confirmar.disabled=false; },
    onAdd: (evento) => { confirmar.disabled=true; }

});

function cerrarSesion(){
    
    return "location.href='closedSession.php'";
}


function clickConfimar(){
    if(verificarTablero())
    {
        console.log("true"); 
        window.location.replace("aciertoOrden.php");
    }
    else
    {
        console.log("false");
        window.location.replace("errorOrden.php");
    }
}

function verificarTablero(){
    const orden = localStorage.getItem("timeline")
    const ordenActual = orden.split('-')
    const ordenado = localStorage.getItem("timeline")
    const ordenadoTablero = ordenado.split('-').sort()
    
    if(ordenActual.join() == ordenadoTablero.join()){
        console.log("true");
        return true
    }
    else{
        console.log("false");
        return false         
    }
}


