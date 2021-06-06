<?php
    include '../Persistence/ConnectionDB.php';

    class AirportsDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($airports) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO airports(nome, porte, distancia, cep) VALUES (?,?,?,?)"
                );

                $statement->bindValue(1, $airports->nome);
                $statement->bindValue(2, $airports->porte);
                $statement->bindValue(3, $airports->distancia);
                $statement->bindValue(4, $airports->cep);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo aeroporto!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM airports");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
    
                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar os aeroportos";
                echo $e;
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare("DELETE FROM airports WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute(); 

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar um aeroporto";
                echo $e;
            }
        }

        public function searchCity($cep) {
            try {
                $statement = $this->connection->prepare("SELECT * FROM cities WHERE cep = ?");
                $statement->bindValue(1, $cep);
                $statement->execute(); 
                $city = $statement->fetchAll();

                $this->connection = null;

                return $city;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar uma cidade com esse cep";
                echo $e;
            }
        }
    }
