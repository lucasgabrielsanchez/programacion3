var txtA;
var txtB;
var btn;
var tBody;

$(function(){
    txtA = $('#text1');
    txtB = $('#text2');
    btn = $('#btn1');
    tBody = $('#cuerpo');

    // btn.click = function(){
    // tBody.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";

    //btn.addEventListener("click",Agregar);
    btn.on("click",Agregar);

    //btn.addEventListener("click",hola);
    //el evento keypress se produce cuando el usuario presiona una tecla en el elemento invocado.
    txtA.keypress(function(){restaurar(txtA,txtB);});
    txtB.keypress(function(){restaurar(txtA,txtB);});

    //agregarr();
    Actualizar(); 
});

function Agregar()
{
    var table = $('#table1');

    if (txtA.val() != "" && txtB.val() != "")
    {

        $.ajax({
        url: "http://localhost:3000/agregarpersona",
        data: {nombre : txtA.val(), apellido : txtB.val()},
        type : "POST",
        dataType : "text",
        success : function(respuesta)
                {
                    var con2 = $("#contenedor2");
                    con2.html(respuesta).hide().fadeIn(2000).fadeOut(2000);
                    //Esto es lo mismo que hacer:
                    //con2.html(respuesta);
                    //con2.hide();
                    //con2.fadeIn(2000);
                    //con2.fadeOut(2000);
                }
        });

        Actualizar();
        txtA.val("");
        txtB.val("");
    }
    else
    {
        txtA.css("borderColor","red");
        txtB.css("borderColor","red");
        txtA.val("");
        txtB.val("");
        alert("Debe completar ambos campos");
    }
    
}

function restaurar(txtA,txtB) 
{
    txtA.css("borderColor","");
    txtB.css("borderColor","");
}

function borrar(id) 
{
    $.ajax({
        url: "http://localhost:3000/eliminarpersona",
        data: {indice : id},
        type : "POST",
        dataType : "text",
        success : function(respuesta)
                {
                    var con2 = $("#contenedor2");
                    con2.html(respuesta).hide().fadeIn(2000).fadeOut(2000);
                }
    });

    Actualizar();
}

function modificar(id) 
{   
    $.ajax({
        url: "http://localhost:3000/traerpersona",
        data: {indice : id},
        type : "GET",
        dataType : "json",
        success : function(respuesta)
                {   
                    $("#text1").val(respuesta.nombre);
                    $("#text2").val(respuesta.apellido);
                }
    });
    
    //setear atributo onclick y pasarle el nuevo metodo y el value
    btn.attr("value", "modificar");

    btn.off("click", Agregar);

    btn.on("click", mod = function(){
        var persona = { nombre : $("#text1").val(), apellido : $("#text2").val() };
        
        $.ajax({
            url: "http://localhost:3000/modificarpersona",
            data: {indice : id, persona : JSON.stringify(persona) },
            type : "POST",
            dataType : "text",
            success : function(respuesta)
                    {
                        var con2 = $("#contenedor2");
                        con2.html(respuesta).hide().fadeIn(2000).fadeOut(2000);
                    }
        });
    
        Actualizar();
        btn.attr("value", "cargar");
        btn.off("click",mod);
        btn.on("click",Agregar);
    });

}

function Actualizar() 
{   
    $.ajax({
        url: "http://localhost:3000/traerpersonas",
        type : "GET",
        dataType : "json",

        beforeSend : function()
        {
            $("#contenedor").html("<img src='810.gif'></img>");
        },

        success : function(respuesta)
        {   
            var personas = respuesta;

            tBody.html("<tr><th>Nombre</th><th>Apellido</th><th>Accion</th></tr>");

            $("#contenedor").html("");

            for (var index = 0; index < personas.length ; index++) 
            {
                tBody.append("<tr><td name=n"+index+">"+personas[index].nombre+"</td><td name=a"+index+">"+personas[index].apellido+"</td>"+
                "<td><input type=button id= "+index+" value=Borrar onclick=borrar("+index+")>"+
                "<input type=button id= "+index+" value=Modificar onclick=modificar("+index+")></td></tr>");
            }                
        }
    });
}