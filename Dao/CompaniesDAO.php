<?php
    include '../Persistence/ConnectionDB.php';

    class CompaniesDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }

        public function create($companies) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO companies(cnpj, razaoSocial, nomeFantasia) VALUES (?,?,?)"
                );

                $statement->bindValue(1, $companies->cnpj);
                $statement->bindValue(2, $companies->razaoSocial);
                $statement->bindValue(3, $companies->nomeFantasia);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir uma nova compania!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM companies");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
    
                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar as companias";
                echo $e;
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare("DELETE FROM companies WHERE cnpj = ?");
                $statement->bindValue(1, $id);
                $statement->execute(); 

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar uma compania";
                echo $e;
            }
        }

        public function searchCompany($cnpj) {
            try {
                $statement = $this->connection->prepare("SELECT * FROM companies WHERE cnpj = ?");
                $statement->bindValue(1, $cnpj);
                $statement->execute(); 
                $companies= $statement->fetchAll();

                $this->connection = null;

                return $companies;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao consultar se existem companis com esse cnpj";
                echo $e;
            }
        }
    }
