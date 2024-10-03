<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <?php // Bloco de PHP dentro do HTML
        /*$conexao = mysqlconnect("localhost", "root", "vertrigo");
        mysql_select_db("agenda", $conexao);*/ /*Antigamente era feito assim. Velho. Não passa o nome do banco de dados.*/

        $conexao = mysqli_connect("localhost", "root", "vertrigo", "agenda");
        //localhost: 127.0.0.1 - IP local
        //root: login
        //vertrigo: senha
        //agenda: nbase de dados
        $dados = mysqli_query($conexao, "SELECT * FROM contato");
        //dados: ResultSet - matriz (no java rs next (for each)).

        //As consultas do BD são matrizes. Esse modo não fica legal a mistuta: php, html e banco. Ideal usar Model VC
    ?>
    <ul>
        <?php
        $i = 1;
        while($usuario = mysqli_fetch_array($dados)) { // Percorre a matriz linha a linha. Array só tem linha
                echo("<LI> Contato nª" . $i . ": " . $usuario["nome"] . "</LI>"); //LI de item. Passar indice 1 seria o primeiro atributo depois de id
                $i++;
        }
        ?>
    </ul>
</body>
</html>