<?php
    include '../Persistence/ConnectionDB.php';

    class UserDAO {
        private $connection = null;

        public function __construct() {
            $this->connection = ConnectionDB::getInstance();
        }
        
        // public function create($user) {
        //     try {
        //         $statement = $this->connection->prepare(
        //             "INSERT INTO usuarios (email, password) VALUES (?,?)"
        //         );

        //         $statement->bindValue(1, $user->email);
        //         $statement->bindValue(2, $user->senha);

        //         $statement->execute();

        //         //var_dump($statement); die();

        //         //Encerra a conexão com o BD
        //         $this->connection = null;
        //     } catch (PDOException $e) {
        //         echo "Ocorreram erros ao inserir novo usuário!";
        //         echo $e;
        //     }
        // }
        // public function search() {
        //     try {
        //         $statement = $this->connection->prepare("SELECT*FROM usuarios");
        //         $statement->execute();
        //         $dados = $statement->fetchAll();
        //         $this->connection = null;

        //         return $dados;
        //     } catch (PDOException $e) {
        //         echo "Ocorreram erros ao buscar os usuários";
        //         echo $e;
        //     }
        // }
        // public function delete($id) {
        //     try {
        //         $statement = $this->connection->prepare("DELETE FROM usuarios WHERE id = ?");
        //         $statement->bindValue(1, $id);
        //         $statement->execute();

        //         $this->connection = null;
    
        //     } catch (PDOException $e) {
        //         echo "Ocorreram erros ao delete o usuário";
        //         echo $e;
        //     }
        //}

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

?>