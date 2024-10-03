<?php
        /*$conexao = mysqlconnect("localhost", "root", "vertrigo");
        mysql_select_db("agenda", $conexao);*/ /*Antigamente era feito assim. Velho. Não passa o nome do banco de dados.*/

        $conexao = mysqli_connect("localhost", "root", "vertrigo", "agenda");
        $dados = mysqli_query($conexao, "SELECT * FROM contato");

        while($usuario = mysqli_fetch_array($dados)) { // Percorre a matriz linha a linha. Array só tem linha.
            $contatos[] = $usuario["nome"]; //Li o nome e joga de um array (vetor) novo 
        }
?>