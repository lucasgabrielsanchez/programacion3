window.onload = function(){
    var txtA = document.getElementById('text1');
    var txtB = document.getElementById('text2');
    var btn = document.getElementById('btn1');
    var tBody = document.getElementById('cuerpo');

    // btn.click = function(){
    // tBody.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";

    btn.addEventListener("click",function(){Actualizar(tBody,txtA,txtB);});
    //el evento keypress se produce cuando el usuario presiona una tecla en el elemento invocado.
    txtA.addEventListener("keypress",function(){restaurar(txtA,txtB);});
    txtB.addEventListener("keypress",function(){restaurar(txtA,txtB);});

}

var i=0;

function Actualizar(tBodys,valor1,valor2)
{
    var table = document.getElementById('table1');

    if (valor1.value != "" && valor2.value != "") 
    {
        i++;
        /*Aquí lo que hago dándole la propiedad block al style de la tabla, es hacer que vuelva a ser
        visible ya que en el html lo oculté, block lo hace visible en un lugar, e inline permite contenido
        flotante a un lado u otro del elemento */
        table.style = "block";
        //inserto en el tBody de la tabla, los elementos ingresados
        tBodys.innerHTML += "<tr><td>"+valor1.value+"</td>"+"<td>"+valor2.value+"</td>"+
                            "<td><input type=button id= "+i+" value=Borrar onclick=borrar("+i+")></td></tr>";

        //a este alert lo uso para probar que es lo que me devuelve el innerHTML del body
        //alert(tBodys.innerHTML);
        //document.getElementById(i);
        valor1.value = "";
        valor2.value = "";
    }
    else
    {
        valor1.style.borderColor="red";
        valor2.style.borderColor="red";
        valor1.value = "";
        valor2.value = "";
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
    /*En principio a esta función la llamo desde el momento en que creo el botón dentro de la función
    Actualizar, ya que es allí donde le doy un id incremental a dicho botón que uso para poder identificar
    a cada botón de manera unívoca. En el momento de crear el botón, el id concedido a dicho botón se lo paso
    a esta función para que cree un objeto de este botón y pueda hacer algo con el. Mi variable botón guarda
    la referencia al botón creado, pero utilizando la propiedad "parentNode" de un objeto html, puedo usarla
    las veces como padre, abuelo, bisabuelo tenga un objeto, es decir en este caso del boton me muevo al 
    tag td con el primer parentNode y con el segundo me muevo al tag tr para igualarlo a "" lo que es lo
    mismo que borrarlo. para ello accedo al outerHTML que es similar al innerHTML, el inner nos permite
    manipular lo que se encuentra dentro del cuerpo contenido por el tag en el que estoy parado, y el 
    outer me permite manipular al tag en si, a la etiqueta en la que estoy parado.*/
    var boton = document.getElementById(id);
    boton.parentNode.parentNode.outerHTML = "";    
}