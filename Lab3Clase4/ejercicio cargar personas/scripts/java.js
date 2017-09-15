window.onload = function(){
    var txtA = document.getElementById('text1');
    var txtB = document.getElementById('text2');
    var btn = document.getElementById('btn1');
    var tBody = document.getElementById('cuerpo');

    // btn.click = function(){
    // tBody.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";

    btn.addEventListener("click",function(){Actualizar(tBody,txtA,txtB);});

}

function Actualizar(tBodys,valor1,valor2)
{
    var table = document.getElementById('table1');

    if (valor1.value != "" && valor2.value != "") 
    {
        /*Aquí lo que hago dándole la propiedad block al style de la tabla, es hacer que vuelva a ser
        visible ya que en el html lo oculté, block lo hace visible en un lugar, e inline permite contenido
        flotante a un lado u otro del elemento */
        table.style = "block";
        tBodys.innerHTML += "<td>"+valor1.value+"</td>"+"<td>"+valor2.value+"</td>"+"<td>nomeacuerdo</td>";
        valor1.value = "";
        valor2.value = "";
    }
    
}