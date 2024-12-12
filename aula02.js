//os falsos
console.log(!!0);
console.log(!!'');
console.log(!!null);
console.log(!!NaN);
console.log(!!undefined);

let nome2 = ""
console.log(nome2 || "Desconhecido");

console.log();

let isAtivo = false;
console.log(isAtivo);

isAtivo = true;
console.log(isAtivo);

isAtivo = 1;
console.log(!!isAtivo); //!=negação
//todos os números inteiros são verdadeiros com excessão do 0

console.log(1<0);

console.log();

//array pode ser heterogêneo
const valores = [7.7, 8.9, 6.3, 9.3]; //no javascrip é colchete, no c em chaves. O vírgula não concatena
console.log(valores[0], valores[3]); // o até 3 índice
console.log(valores[4]); //undefined

valores[4] = 10;
console.log(valores);
console.log(valores.length);
valores.push({id:3}, false, null, "teste"); //coloca mais itens
//adiciona objetos
//id{id:3} - objeto
console.log(valores);

console.log(valores.pop()); //exclui o último
delete valores[0]; //deleta o índice zero
console.log(valores);

console.log(typeof valores); //tipo dos itens

console.log();


//objetos
const prod1 = {}; //representa objeto
//[] representa array

prod1.nome = "Celular";
prod1.preco = 5000;
prod1["desconto"] = 0.4;
//outro forma de definir atributo

console.log(prod1);

const prod2 = {
    nome: "Camisa Polo",
    preco: 80.0
};
//diferente de JSON, lá o índice fica entre aspas. faz com cahves

console.log(prod2);





console.log();



console.log(typeof Object);

class Produto{};
console.log(typeof Produto);





console.log();



//funcao sem retorno
function imprimirSoma(a, b) {
    console.log(a+b);
}

imprimirSoma(2,4);

//Função com retorno
function soma(a, b=1) { //entrada default
    return a+b;
}

console.log(soma(2,3));
console.log(soma(2));



console.log();


//armazenando uma função em uma variável
const imprimirSoma2 = function (c, d) {
    console.log(c+d);
};

imprimirSoma2(2,3);

//Armazenando uma função arrow (seta) em uma variável
const soma2 = (c, d) => {
    return c+d;
}

console.log(soma2(2,3));

//retorno implicito
const subtracao = (c,d) => c-d;
console.log(subtracao(5,3));

const imprimir2 = c => console.log(c);
imprimir2("Hello");

//5 formas de fazer função



console.log();


{
    {
        {
            {
                var abc = "ABC"
            }
        }
    }
}

console.log(abc);

function teste(){
    var local = 123;
    console.log(local);
}
teste();
//console.log(local);