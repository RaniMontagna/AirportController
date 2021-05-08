<?php
    include '../Persistence/ConnectionDB.php';

    class CitiesDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($user) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO cities(cep, nome, pais, estado) VALUES (?,?,?,?)"
                );

                $statement->bindValue(1, $user->cep);
                $statement->bindValue(2, $user->nome);
                $statement->bindValue(3, $user->pais);
                $statement->bindValue(4, $user->estado);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir uma nova cidade!";
                echo $e;
            }
        }
    }


?>