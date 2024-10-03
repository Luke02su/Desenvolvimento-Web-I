<?php
    class Connectionfactory { // USa pdbo (objeto de persist~encia de dados, gravar dados), não mysqli
        public $con = null; // declarando parâmetros (variáveis de objeto)
        public $dbType = "mysql";
        public $host = "localhost";
        public $user = "root";
        public $senha = "vertrigo";
        public $db = "agenda";
        public $persistente = false; // não persistente
        //Se for persistente, a conexão se mantém até que o usuário pare de se comunicar com o sistema. (Exemplo: banco não pode fechar.)
        //Conexão não persistente não precisa ter fluxo até terminar o processo. A maioria não é persistente. 

        public function __construct($persistente = false) { // construtor. Se não passar parâmetro, se torna falso por padrão.
            //$this->persistente = $persistente;
            if($persistente != false) {
                $this->persistente= true; // vira persistente
            }
        }

        public function getConnection() { //
            try { // tentando se conectar no banco
                //Persistent Data Object 
                //Persistência de dados - manipular db
                $this->con = new PDO ( // Garante algumas coisas: segurança etc. Recebe um novo objeto. Recebe os parâmetros abaixo
                    $this->dbType.":host=".$this->host.";dbname=".$this->db, // primeiro parãmetro: String de conexão. Pode mudar para algum outro banco
                    $this->user,
                    $this->senha,
                    array(PDO::ATTR_PERSISTENT => $this->persistente, // quarto parâmetro: ATTR-PERSISTENT (atributo estático) que recebe persistente
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) // Pega outro atributo de classe que recebe outro atributo de erro (mensagem)
                );
                //String de conexão
                //mysql:host=localhost;dbname=agenda
                return $this->con; // retorna a conexão feita
            } 
            catch(PDOExeption $ex) { // Erro ao conectar
                echo "Erro: " . $ex->getMessage();
            }
        }

        public function close() { // Fecha a conexão.
            if($this->con != null) { // Se for diferente de nula
                $this->con = null; // Se torna nula
            }
        }
    }
?>