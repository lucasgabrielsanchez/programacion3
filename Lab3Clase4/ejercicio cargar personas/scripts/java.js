window.onload = function(){
    var txtA = document.getElementById('text1');
    var txtB = document.getElementById('text2');
    var btn = document.getElementById('btn1');
    var tBody = document.getElementById('cuerpo');

    // btn.click = function(){
    // tBody.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";

    btn.addEventListener('click',Actualizar(tBody));

}

function Actualizar(tBodys) {
    tBodys.innerHTML += "<td>hola</td><td>hola</td><td>hola</td>";
}