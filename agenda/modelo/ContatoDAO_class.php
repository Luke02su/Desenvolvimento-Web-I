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

        //alterar
		public function alterar($cont){
			try{
				$stmt = $this->con->prepare(
				"UPDATE contato SET nome=:nome, 
				email = :email, telefone=:telefone WHERE
				id=:id");
				
				//ligamos as âncoras aos valores de Contato
				$stmt->bindValue(":nome", $cont->getNome());
				$stmt->bindValue(":email", $cont->getEmail());
				$stmt->bindValue(":telefone", $cont->getTelefone());
				$stmt->bindValue(":id", $cont->getId());
				
				$this->con->beginTransaction();
			    $stmt->execute(); //execução do SQL	
				$this->con->commit(); 
				/*$this->con->close();
				$this->con = null;*/	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		//excluir
		public function excluir($cont){
			try{
				$num = $this->con->exec("DELETE FROM contato WHERE id = " . $cont->getId());
				//numero de linhas afetadas pelo comando
				
				if($num >= 1){
					return 1;
				} else {
					return 0;
				}
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
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

        		//exibir 
		public function exibir($id){			
			try{				
				$lista = $this->con->query("SELECT * FROM contato WHERE id = " . $id);
				
				/*$this->con->close();
				$this->con = null;*/
				
				$dado = $lista->fetchAll(PDO::FETCH_ASSOC);
				
				$c = new Contato();
				$c->setId($dado[0]["id"]);
				$c->setNome($dado[0]["nome"]);
				$c->setTelefone($dado[0]["telefone"]);
				$c->setEmail($dado[0]["email"]);
				
				return $c;	
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
			
		}
    }
?>