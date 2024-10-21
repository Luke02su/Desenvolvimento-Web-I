<?php
    session_start(); //Inicia a sessão
    //área de memória dentro do servidor
    //carrinho de compras, seus dados de conexão
    //qualquer variável que vc queira criar

        include_once("controle/ListarContato_class.php");
        $index = new listarContato();
        //atribuição de responsabilidade
        //o controle sabe exibir aa lista de contatos
        //include_once("visao/base.php");
?>