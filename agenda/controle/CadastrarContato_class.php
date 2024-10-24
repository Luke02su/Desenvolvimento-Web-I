<?php
    include_once("modelo/ContatoDAO_class.php");
    class CadastrarContato {
        //Controle

        public function __construct() {
            if(isset($_POST["enviar"])) { // está setado para enviar?
                //formulário enviar foi enviado

                $c = new Contato();
                $c->setNome($_POST["nome"]);
                $c->setEmail($_POST["email"]);
                $c->setTelefone($_POST["telefone"]);
                //$c->setFoto("qwe");

                $dao = new ContatoDAO();
                $dao->cadastrar($c);

                $status = "Cadastro de Contato " . $c->getNome() . " efetuado com sucesso";

                $lista = $dao->listar();

                include_once("visao/listaContato.php");

            } else {
                include_once("visao/formCadastroContato.php");
            }
        }
    }
?>