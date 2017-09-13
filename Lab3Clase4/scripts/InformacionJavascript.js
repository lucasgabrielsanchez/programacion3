//var a = 5 -- typeof(a) devuelve number
//var a = true -- typeof(a) devuelve boolean
//var a = ["1","hola"] -- typeof(a) devuelve object
//var a = mifuncion(a,b) -- typeof(a) devuelve function
//var a; typeof(a) devuelve undefined

/*
function miFuncion(a,b)
{
    var resultado = a+b;

    if(a==0)
    {
        var resultado = "no sumo ceros";
    }

    return resultado;
} 

miFuncion(0,2);

en este caso se imprime "no sumo ceros" porque en Javascript una variable dentro de una función tiene un scope igual en toda 
la función. Una variable global se define sin "var".

//expresión lambda, define una función anónima sin la palabra reservada function
var funcionAnonima = (a,b) => {
    var resultado = a+b;

    return resultado;
}

//con esta función de contador tengo el problema que la variable es accesible por cualqueira porque es globarl
var contador = 0;

function incrementar()
{
    contador++;
}

//tengo que buscar la manera de encapsular la variable para no ser vista por todos.
//si lo hago asi se encapsulo la variable pero se reinicia cada vez que llamo la función 
function incrementar()
{
    var contador = 0;
    contador++;
}

//una forma de solucionarlo es asi:
{
    var inc = ( function() {
        var counter = 0;
        return function() { return counter++;}
    }
    ) ();

    //se incrementa y no es visible la variable
    inc();
    inc();
}

//función que recibe 2 parametros numericos y opcionalmente una función que queramos

function Suma(a,b,callback){
    var resultado = parseInt(a)+parseInt(b);

    //pregunto si callback es una función, el triple = compara tipo y valor.
    if(typeof(callback) === "function"){
        callback(resultado);
    }
}

//ejemplo
function callback(valor)
{
    alert(valor);
}

 */

//me suscribo al evento que indica que se cargó la página html para agregarle mi función anónima
//la cual obtiene en 2 variables, los objetos de los input "number" que hice en mi html y tomos sus value

/*Hay 2 maneras de suscribirse a un evento:
1->windows.onload = function(){codigo..}

2->windows.addEventListener('onload', function(){codigo})

otro ejemplo:
1-> btnSumar.onclick = function(){alert("hola")};

2->btnSumar.addEventListener('onclick', function(){alert("hola")});

 */

function mostrar(resultado)
{
    alert("la suma es "+resultado)
}

function Suma(a,b,callback){
    var resultado = parseInt(a) + parseInt(b);

    //pregunto si callback es una función, el triple = compara tipo y valor.
    if(typeof(callback) === "function"){
        callback(resultado);
    }
}

window.onload = function()
{
   var txtA = document.getElementById('number1').value;
   var txtB = document.getElementById('number2').value;

   var btnSumar = document.getElementById('buton1');

   var resultadito = "";
   btnSumar.onclick = Suma(txtA,txtB,mostrar(resultadito));
}

/*simulando un constructor y un objeto

var Auto = function(nafta){
    var _nafta = nafta;

    this.setNafta = function(value){
    _nafta = value;
    }

    this.getNafta = function(){
    return _nafta;
    }
}

var auto1 = new Auto(100);
alert(auto1.getNafta()); -->100
auto1.setNafta(50);
alert(auto1.getNafta()); -->50

//manera de harcodear un objeto, es la notación JSON
var auto2 = {
    nafta:100,
    puertas:5,
    patente:"AAA111",

    setNafta: function(){},
    getNafta: function(){},
}
*/ 