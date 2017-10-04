var txtA;
var txtB;
var btn;
var tBody;

window.onload = function(){
    txtA = $('text1');
    txtB = $('text2');
    btn = $('btn1');
    tBody = $('cuerpo');

    // btn.click = function(){
    // tBody.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";

    btn.addEventListener("click",Agregar);

    //btn.addEventListener("click",hola);
    //el evento keypress se produce cuando el usuario presiona una tecla en el elemento invocado.
    txtA.addEventListener("keypress",function(){restaurar(txtA,txtB);});
    txtB.addEventListener("keypress",function(){restaurar(txtA,txtB);});

    //agregarr();
    Actualizar(); 
}

function Agregar()
{
    var table = $('table1');

    if (txtA.value != "" && txtB.value != "")
    {
        xhr = new XMLHttpRequest();
        //xhr.onreadystatechange = gestionarRespuesta2;
        //var misDatos={ nombre:"Lucas" , apellido:"Suarez" };
        var misDatos = "nombre="+txtA.value+"&apellido="+txtB.value;
        xhr.open('POST',"http://localhost:3000/agregarpersona",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        //xhr.setRequestHeader("Content-length", misDatos.length);
        
        xhr.send(misDatos);
        Actualizar();
        txtA.value = "";
        txtB.value = "";
    }
    else
    {
        txtA.style.borderColor="red";
        txtB.style.borderColor="red";
        txtA.value = "";
        txtB.value = "";
        alert("Debe completar ambos campos");
    }
    
}

function restaurar(txtA,txtB) 
{
    txtA.style.borderColor="";
    txtB.style.borderColor="";
}

function borrar(id) 
{
    xhr = new XMLHttpRequest();
    //xhr.onreadystatechange = gestionarRespuesta2;
    //var misDatos={ nombre:"Lucas" , apellido:"Suarez" };
    
    xhr.open('POST',"http://localhost:3000/eliminarpersona",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    //xhr.setRequestHeader("Content-length", misDatos.length);
    
    
    xhr.send("indice="+id);

    Actualizar();
}

function modificar(id) 
{   
    xhr = new XMLHttpRequest();
    //evento/delegado(la propiedad readystate tiene 4 estados representados por números, a nosotros nos interesa
    //el estado 4 en esta ocasión)
    xhr.onreadystatechange = gestionarRespuesta2;
    //abrir conexión (puede ser Post o Get), url del archivo a pegarle, true para que sea asincrónico.
    xhr.open('GET',"http://localhost:3000/traerpersona?indice="+id,true);
    //enviar petición
    xhr.send();
    
    //setear atributo onclick y pasarle el nuevo metodo y el value
    btn.setAttribute("value", "modificar");

    btn.removeEventListener("click",Agregar);

    btn.addEventListener("click", mod = function(){
        var txt1 = $('text1');
        var txt2 = $('text2');
        var persona = { nombre : txt1.value, apellido : txt2.value };
        xhr = new XMLHttpRequest();
        xhr.open('POST',"http://localhost:3000/modificarpersona",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        //xhr.setRequestHeader("Content-length", misDatos.length);
        xhr.send("indice="+id+"&persona="+JSON.stringify(persona));
        
        Actualizar();
        btn.setAttribute("value", "cargar");
        btn.removeEventListener("click",mod);
        btn.addEventListener("click",Agregar);
    });

}

function Actualizar() 
{   
    // var nombre = document.getElementById('txtNombre').value;
    // var edad = document.getElementById('txtEdad').value;
    //objeto de JavaScript.
    xhr = new XMLHttpRequest();
    //evento/delegado(la propiedad readystate tiene 4 estados representados por números, a nosotros nos interesa
    //el estado 4 en esta ocasión)
    xhr.onreadystatechange = gestionarRespuesta;
    //abrir conexión (puede ser Post o Get), url del archivo a pegarle, true para que sea asincrónico.
    xhr.open('GET',"http://localhost:3000/traerpersonas",true);
    //enviar petición
    xhr.send();
}

function gestionarRespuesta() 
{
    var div = $('contenedor');
    var table = $('table1');

    //el status 200 es que está todo ok
    if (xhr.readyState == 4)
    {
        if (xhr.status == 200) 
        {
            var personas = JSON.parse(xhr.response);

            tBody.innerHTML="<tr><th>Nombre</th><th>Apellido</th><th>Accion</th></tr>";
            div.innerHTML = "";

            for (var index = 0; index < personas.length ; index++) 
            {
                tBody.innerHTML +=
                "<tr><td name=n"+index+">"+personas[index].nombre+"</td><td name=a"+index+">"+personas[index].apellido+"</td>"+
                "<td><input type=button id= "+index+" value=Borrar onclick=borrar("+index+")>"+
                "<input type=button id= "+index+" value=Modificar onclick=modificar("+index+")></td></tr>";
            }

            //div.innerHTML = xhr.responseText; //la respuesta puede venir como texto, xml, Json, etc
        }
        else
        {
            //el numero de error y el texto del error
            div.innerHTML = "Error: " + xhr.status + " " + xhr.statusText;
        }
        
    }
    else
    {
        div.innerHTML = "<img src='810.gif'></img>";
    }
}

function gestionarRespuesta2()
{
    var txt1 = $('text1');
    var txt2 = $('text2');
    var div = $('contenedor');

    if (xhr.readyState == 4)
    {
        if (xhr.status == 200) 
        {
            var persona = JSON.parse(xhr.response);

            txt1.value = persona.nombre;
            txt2.value = persona.apellido;
            //div.innerHTML = xhr.responseText; //la respuesta puede venir como texto, xml, Json, etc
        }
        else
        {
            //el numero de error y el texto del error
            div.innerHTML = "Error: " + xhr.status + " " + xhr.statusText;
        }
    }
    else
    {
        div.innerHTML = "<img src='810.gif'></img>";
    }
}

function $(id) 
{
    return document.getElementById(id);
}