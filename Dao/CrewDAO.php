<?php
    include '../Persistence/ConnectionDB.php';

    class CrewDAO {
        private $connection = null;

        public function __construct() {
            $this->connection =ConnectionDB::getInstance();
        }

        public function create($crew) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO crew(nome, idade, email, senha, tipo) VALUES (?,?,?,?,?)"
                );

                $statement->bindValue(1, $crew->nome);
                $statement->bindValue(2, $crew->idade);
                $statement->bindValue(3, $crew->email);
                $statement->bindValue(4, $crew->senha);
                $statement->bindValue(5, $crew->tipo);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo tripulante!";
                echo $e;
            }
        }
    }


?>