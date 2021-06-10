<?php
include '../Persistence/ConnectionDB.php';

class TravelDAO
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDB::getInstance();
    }

    public function create($travel)
    {
        try {
            $statement = $this->connection->prepare(
                "INSERT INTO travels(aeroportoDestino, aviao, dataSaida) VALUES (?,?,?)"
            );

            $statement->bindValue(1, $travel->aeroportoDestino);
            $statement->bindValue(2, $travel->aviao);
            $statement->bindValue(3, $travel->dataSaida);

            $statement->execute();

            // var_dump($statement); die();

            //Encerra a conexão com o DB
            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao inserir uma nova viagem!";
            echo $e;
        }
    }

    public function search()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM travels");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar as viagens";
            echo $e;
        }
    }

    public function delete($id)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM travels WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao deletar uma viagem";
            echo $e;
        }
    }

    public function searchAirports()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM airports");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar aeroportos";
            echo $e;
        }
    }

    public function searchAircrafts()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM aircraft");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar aeronaves";
            echo $e;
        }
    }
}
