<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <?php
        if(isset($status)) {echo "<H2>".$status."<H2>";}
        //Se $status está preenchido, imprimir tela
    ?>
    <a href="contato.php?fun=cadastrar" > Cadastrar </a> <!--Roteador-->
    <br /><br />

    <TABLE border="1px">
        <TR>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th><img src="visao/img/update.png" width='30px' /></th>
            <th><img src="visao/img/delete.png" width='30px' /></th>
        </TR>
    <!--Primeira linha da tabela com o cabeçalho -->

    <?php
        foreach($lista as $c) {
            echo "<TR>";
            echo "<TD>" . $c->getId() . "</TD">;
            echo "<TD><a href=contato.php?fun=exibir&id=" . $c->getId() . ">" . $c->getNome() . "</a></TD>";
            echo "<TD>" . $c->geEmail() . "</TD>";
            echo "<TD>" . $c->getTelefone() . "</TD>";
            echo "<TD><a href=contato.php?fun=alterar&id=" . $c->getId() . "><img src='visao/img/update.png' width='30px' /> . </a></TD>";
            echo "<TD><a href=contato.php?fun=alterar&id=" . $c->getId() . "><img src='visao/img/delete.png' width='30px' /> . </a></TD>";
            echo "</TR>";
        }
    ?>
    </TABLE>
</body>
</html>