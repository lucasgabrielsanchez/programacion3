window.onload = function()
{
    var btnLeer = document.getElementById('btnLeer');

    //btnLeer.addEventListener("click", function(){enviar();});

    //otra forma, de esta manera solo se pasa el nombre de la funcion sin parentesis
    //si es necesario pasar parametros se hace como está arriba.
    btnLeer.addEventListener("click", enviar);
    
}

var xhr;

function enviar() 
{   
    //objeto de JavaScript.
    xhr = new XMLHttpRequest();
    //evento/delegado(la propiedad readystate tiene 4 estados representados por números, a nosotros nos interesa
    //el estado 4 en esta ocasión)
    xhr.onreadystatechange = gestionarRespuesta;
    //abrir conexión (puede ser Post o Get), url del archivo a pegarle, true para que sea asincrónico.
    xhr.open('GET','prueba.txt',true);
    //enviar petición
    xhr.send();
    alert("Hola");
}

function gestionarRespuesta(params) 
{
    var div = document.getElementById('contenedor');

    //el status 200 es que está todo ok
    if (xhr.readyState == 4)
    {
        if (xhr.status == 200) 
        {
            div.innerHTML = xhr.responseText; //la respuesta puede venir como texto, xml, Json, etc
        }
        else
        {
            //el numero de error y el texto del error
            div.innerHTML = "Error: " + xhr.status + " " + xhr.statusText;
        }
        
    }
}

//tipos de errores que devuelve el servidor (status), 404, 500, 403 forvidden
//pagina util preloader, nos brinda gifs de carga