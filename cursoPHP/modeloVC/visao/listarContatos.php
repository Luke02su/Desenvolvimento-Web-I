<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <?php
        include_once "../controle/controleListar.php";
    ?>
    <h1>Lista de Contatos</h1>
    <ul>
        <?php
            foreach($contatos as $i=>$nome) { // Para cada item (contato) desse array, cria um i que guarda automaticamente um índice. Coloca cada item desse foreach no nome
                $i++;
                echo "<li> Contato nº $i : $nome </li>"; 
            }
        ?>
    </ul>
</body>
</html>