<?php
    include_once("ConnectionFactory_class.php"); //PDO. Chamando conexão com o BD
    include_once("Contato_class.php"); // entidade. Get e Set

    class ContatoDAO {
        //DAO - Data Acess Object 
        //CRUD - Creat, Red, Update e delete
        //Operações básicas de banco de dados
    
        public $con = null; //Obj recebe conexão

        public function __construct() {
            $conF = new ConnectionFactory(); // Cria um objeto da conexão
            $this->con = $conF->getConnection(); // Atributo de contatoDAo é a conexão aberta. Chama o getConnection do ConnectionFactory
        }

        //cadastrar
        public function cadastrar($cont) { // Recebe objeto do tipo contato
            try{
                $stmt = $this->con->prepare ( //PrepareStatement igual do Java
                "INSERT INTO contato (nome, email, telefone) VALUES (:nome, :email, :telefone)"); // :nome = ? do java. Ancôra
                //SQL Injection = SQL dentro do SQL = hacker, dar permissões. PDO ajuda nisso, na segurança

                $stmt->bindValue(":nome", $cont->getNome()); //Bind: ligar, conectar
                $stmt->bindValue(":email", $cont->getemail());
                $stmt->bindValue(":telefone", $cont->getTelefone());

                $stmt->execute(); //execução do SQL. Não fecho conexão para não ficar reiniciando toda vez.
                /*this->con->close();
                $this->con = null;*/
             }
            catch(PDOExeption $ex) {
                echo "Erro" . $ex->getMessage();
            }
        }



    }
?>