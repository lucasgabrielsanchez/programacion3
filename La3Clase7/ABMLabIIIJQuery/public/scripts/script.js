// el $ es como escribir jquery es como el window.onload en este caso.
$(function (){
    ///esto es como document.getElementById, puedo usar los selectores para seleccionar elementos al igual que en css.
    var boton = $("#boton1");

    ///esto es como agregarle un manejador al evento.
    boton.click(manejadorBoton);
});

function manejadorBoton()
{
    ///val es como el value de javascript, se lo llama como una función.
    alert($("#nombre").val());
}