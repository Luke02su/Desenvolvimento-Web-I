<?php

    class Professor extends Funcionario { //herança
        var $disciplina;

        function __construct($n, $s, $d) {
            parent::__construct($n, $s); // dois pontos chamando static, método de classe //aumentosalario é método do objeto
            $this->disciplina = $d;
        }

        function setDisciplina($disciplina){
            $this->disciplina($disciplina);
        }
    }

?>