<?php
include '../Persistence/ConnectionDB.php';

class UserDAO
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDB::getInstance();
    }

    public function create($user)
    {
        try {
            $statement = $this->connection->prepare(
                "INSERT INTO user (email, senha) VALUES (?,?)"
            );

            $statement->bindValue(1, $user->email);
            $statement->bindValue(2, $user->password);

            $statement->execute();

            //var_dump($statement); die();

            //Encerra a conexão com o BD
            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao inserir novo usuário!";
            echo $e;
        }
    }

    public function search()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM User");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar os usuários";
            echo $e;
        }
    }
    public function delete($id)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM User WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao deletar o usuário";
            echo $e;
        }
    }

    public function find($email, $password)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM User WHERE email = ? and senha = ?");
            $statement->bindValue(1, $email);
            $statement->bindValue(2, $password);
            $statement->execute();
            $user = $statement->fetchAll();

            $this->connection = null;

            return $user;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao procurar o usuário!";
            echo $e;
        }
    }

    public function searchUser($email)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM User WHERE email = ?");
            $statement->bindValue(1, $email);
            $statement->execute();
            $email = $statement->fetchAll();

            $this->connection = null;

            return $email;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar um usuário com esse email";
            echo $e;
        }
    }
}
