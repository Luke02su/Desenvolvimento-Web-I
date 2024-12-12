//destructing

const pessoa = {
    nome: "Ana",
    idade: 5,
    endereco: {
        log: "Rua ABC",
        num: 100
    }
}

const {nome, idade} = pessoa
//extraia de pessoa nome e idade
console.log(nome, idade)

const {nome:n, idade:i} = pessoa
console.log(n,i)

const {sobrenome, bemHumorado=true} = pessoa
console.log(sobrenome, bemHumorado)

const {endereco:{log, num, cep}} = pessoa
console.log(log, num, cep)



console.log();



//destructing no array

const [a] = [10] //[a] operador destructing
//extrai e atribui a 10
console.log(a)

const[n1, , n3 , n5, n6=0] = [10, 7, 9, 8]
console.log(n1, n3, n5, n6)

const [, [nota]] = [[,8,8], [9,6,8]]
console.log(nota)


console.log()

//destruring

function rand({min=0, max=1000}) {
    const valor = Math.random()*(max-min) + min
    return Math.floor(valor)
}

const obj = {max:60, min:40}
console,log(rand(obj))
console.log(rand({min:955}))
console.log(rand({}))



console.log()

//operador ternário


const resultado = nota => nota >= 7 ? "Aprovado" : "Reprovado"

/*const resultado  = nota => {
    nota >= 7 ? "Aprovado" : "Reprovado"
}*/

//funcao arrow
//as definimos como variaveis constantes
//o retorno fica depois das setas
//se não requerer parâmetro usar()

console.log(resultado(7, 11))
console.log(resultado(6,7))
