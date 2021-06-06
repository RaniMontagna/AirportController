<?php
    include '../Persistence/ConnectionDB.php';

    class UserDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }
        
        public function find($email, $senha) {
            try {
                $statement = $this->connection->prepare("SELECT * FROM User WHERE email = ? and senha = ?");
                $statement->bindValue(1, $email);
                $statement->bindValue(2, $senha);
                $statement->execute();
                $user = $statement->fetchAll();

                $this->connection = null;

                return $user;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao procurar o usuário!";
                echo $e;
            }
        }
    }
