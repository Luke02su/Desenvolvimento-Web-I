<?php
    include "Funcionario.php"; //copia tudo de funcionario.php e cola aqui

    $f = new Funcionario("Pedro Cabral", 1200); // criando objeto
    
    echo "O funcionario " . $f->nome . "recebe " . $f->salario ."<br/><br/>";

    $f->aumentoSalario(500);

    echo "Novo salario: " . $f->salario;

?>