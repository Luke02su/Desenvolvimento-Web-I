console.log("Oi"); //Comentário de uma linha
console.log(1+3);
console.log("Teste 123");

/*
Comentários
de múltiplas
linhas
*/



var nome = "caneta";
var quant = 10;
var preco = 6.4;
var imposto = 1.5;
var precoFinal = preco + imposto;

console.log("Produto " + nome + " custa " + precoFinal + ".");


console.log();



let idade = 31;
console.log(typeof 31); //typeof volta o tipo da variável (string, number)
console.log(typeof idade);

let salario = 4578.32;
console.log(typeof salario);

let estaChovendo = false; // true
console.log(typeof estaChovendo);

console.log(typeof "Teste");

console.log(idade);

//Tipagem dinâmica do Javascript, igual PHP

const peso1 = 1.1; // constante
const peso2 = Number(2.0); //tipificando, sempre ficando desse jeito

console.log(peso1, peso2);

console.log(Number.isInteger(peso1));
console.log(Number.isInteger(peso2));

const avaliacao1 = 9.87;
const avaliacao2 = 6.87;

const total = avaliacao1 * peso1 + avaliacao2 * peso2;
const media = total / (peso1+peso2);

console.log(media);
console.log(media.toFixed(2)); //2 casas decimais

console.log(media.toString()); // number para string

//Cuidados com algumas imprecisões.


console.log();


const raio = 5.6;
const area = Math.PI * Math.pow(raio, 2); // biblioteca math, elevação

console.log(area);
console.log(typeof Math);


console.log();


const escola = "IFTM Campus Patrocínio";
console.log(escola.charAt(3)); //índice, começando do 0
console.log(escola.charAt(5));
console.log(escola.charCodeAt(3));
console.log(escola.indexOf("a")); //primeira ocorrência

console.log(escola.substring(1)); // oculta o índice 1 I
console.log(escola.substring(0,3)); //mostra do índice 0 até o 3, ocultando último

console.log("Escola ".concat(escola).concat("!")); //concatenando
console.log("Escola " + escola + "!"); //concatenando
console.log(escola.replace("M", "e")); // substitui  M por e
console.log("Ana,Maria,Pedro".split(",")); //array, utilizado em csv. leitura de String separando por vírgula




console.log();



const name = "Pedro";
const concat = "Olá " + name; //concatenado

const template = `
            Olá 
                    ${name} + ${1+1}!`; //crase não é aspas simples. Template, considera espaço

console.log(concat, template);

//expressões
console.log(`1+1 = ${1+1}`);
//${} - interpolação

const up = texto => texto.toUpperCase();//função rápida. up nome da função, recebe texto indica texto.toUppeCase();
console.log(`Ei... ${up("cuidado")}!`);



console.log();




console.log(typeof Object); // tipo do objeto

class Produto{}
console.log(typeof Produto); //tipo da classe

