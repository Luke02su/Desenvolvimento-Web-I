<?php

    class Funcionario { // criacao de clasee
        var $nome, $salario; // criando variáveis

        function __construct($n, $s) { // função __construtor recebendo nome e salario, inicializa atributos da classe
            $this->nome = $n;
            $this->salario = $s;
        }

        function aumentoSalario($valor) { // função 
            $this->salario += $valor;
        }

        static function teste() {
            echo "Método de classe";
        } 
    }

?>