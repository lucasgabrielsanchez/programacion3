window.onload = function()
{
    var frm = document.getElementById('frm1');
    
    frm.addEventListener("submit",enviarDatos);
}

function enviarDatos(e)
{
    //mato la lista de invocación del evento
    e.preventDefault();
    //console.log(e);
    enviarFormulario();
}

function enviarFormulario() 
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
            div.innerHTML = "<br>" + xhr.responseText; //la respuesta puede venir como texto, xml, Json, etc
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