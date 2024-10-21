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

        public function listar($query = null) {
            //se não recebe parãmetro *ou seja, uma consulta personalizada)
            //$query recebe nulo
            try {
                if ($query == null) {
                    $dados = $this->con->query("SELECT * FROM contato"); //Se for null, faz a busca geral, não especifica
                    //dataset (conjunto de dados) com todos os dados
                    //query() é a função PDO, executa SQL
                } else {
                    $dados = $this->con->query($query);
                    //se listar receber parãmetro este será uma SQL
                    //SQL específica
                }
                $lista = array(); //crio chamando função array()
                foreach($dados as $linha) { 
                //percorre linha a linha de dados e coloca cada registro 
                //na variável linha, que é um array (vetor)
                    $c = new Contato();
                    $c->setId($linha["id"]);
                    $c->setNome($linha["nome"]);
                    $c->setTelefone($linha["telefone"]);
                    $c->setEmail($linha["email"]);
                    $lista[] = $c; //vetor de objetos
                }
                return $lista;
            }
            catch(PDOException $ex) {
                echo "Erro " . $ex->getMessage();
            }
        }
    }
?>