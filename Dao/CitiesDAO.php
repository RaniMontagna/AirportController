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

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM cities");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
    
                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar as cidades";
                echo $e;
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare("DELETE FROM cities WHERE cep = ?");
                $statement->bindValue(1, $id);
                $statement->execute(); 

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar uma cidade";
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
