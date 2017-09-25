window.onload = function()
{
    var btnEnviar = document.getElementById('btnEnviar');

    //btnLeer.addEventListener("click", function(){enviar();});

    //otra forma, de esta manera solo se pasa el nombre de la funcion sin parentesis
    //si es necesario pasar parametros se hace como está arriba.
    btnEnviar.addEventListener("click", enviar);
    
}

var xhr;

function enviar() 
{   
    var nombre = document.getElementById('txtNombre').value;
    var edad = document.getElementById('txtEdad').value;
    //objeto de JavaScript.
    xhr = new XMLHttpRequest();
    //evento/delegado(la propiedad readystate tiene 4 estados representados por números, a nosotros nos interesa
    //el estado 4 en esta ocasión)
    xhr.onreadystatechange = gestionarRespuesta;
    //abrir conexión (puede ser Post o Get), url del archivo a pegarle, true para que sea asincrónico.
    xhr.open('GET',"http://localhost:8080/Lab3Clase5/pagina1.php?nombre=" + nombre + "&edad=" + edad ,true);
    //enviar petición
    xhr.send();
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
    else
    {
        div.innerHTML = "<br><img src='810.gif'/>";
    }
}

//tipos de errores que devuelve el servidor (status), 404, 500, 403 forvidden
//pagina util preloader, nos brinda gifs de carga