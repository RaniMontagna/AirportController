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
    }


?>