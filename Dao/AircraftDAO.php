<?php
    include '../Persistence/ConnectionDB.php';

    class AircraftDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($aircraft) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO aircraft(nome, marca, tipoMotor, maxPassageiros, compania) VALUES (?,?,?,?,?)"
                );

                $statement->bindValue(1, $aircraft->nome);
                $statement->bindValue(2, $aircraft->marca);
                $statement->bindValue(3, $aircraft->tipoMotor);
                $statement->bindValue(4, $aircraft->qtdPassageiros);
                $statement->bindValue(5, $aircraft->compania);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir uma nova aeronave!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM aircraft");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
    
                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar as aeronaves";
                echo $e;
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare("DELETE FROM aircraft WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute(); 

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar uma aeronave";
                echo $e;
            }
        }
    }


?>