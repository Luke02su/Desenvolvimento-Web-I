<?php //Possível usar HTML dentro do PHP
    $nome = $_GET["nome"]; //Índice de array (endereço) (puxando d3e cadastro, no formulário)
    $tutor = $_GET["tutor"];
    
    // Todas variáveis do PHP utilizam $
    //_GET é um array que foi automaticamente criado
    //method for POST -> _POST

    echo "Nome: " . $nome . " Tutor: " . $tutor . "<br/><br/>";
    // ou assim: echo "Nome: $nome e Tutor: $tutor <br/>;
    
    // quebra de linha </br>
    // echo é o print mais comum do PHP
    // Concatenação é ponto (.)

    $con = mysqli_connect("localhost", "root", "vertrigo", "veterinaria"); // conectar ao mysql

    $sql = "INSERT INTO animal (nome, tutor) VALUES ('$nome', '$tutor')";

    $resultado = mysqli_query($con, $sql);
?>