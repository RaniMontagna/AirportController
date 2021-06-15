<?php
include '../Persistence/ConnectionDB.php';

class TravelCrewDAO
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDB::getInstance();
    }

    public function create($travelCrew)
    {
        try {
            $statement = $this->connection->prepare(
                "INSERT INTO travelsCrew(voo, tripulante) VALUES (?,?)"
            );

            $statement->bindValue(1, $travelCrew->viagem);
            $statement->bindValue(2, $travelCrew->tripulante);

            $statement->execute();

            // var_dump($statement); die();

            //Encerra a conexão com o DB
            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao inserir um novo tripulante!";
            echo $e;
        }
    }

    public function search($viagem)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM travelsCrew WHERE voo = $viagem");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar os tripulantes";
            echo $e;
        }
    }

    public function delete($viagem, $tripulante)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM travelsCrew WHERE voo = ? AND tripulante = ?");
            $statement->bindValue(1, $viagem);
            $statement->bindValue(2, $tripulante);
            $statement->execute();


            $this->connection = null;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao deletar o tripulante";
            echo $e;
        }
    }

    public function searchCrew()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM crew");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao buscar os tripulantes";
            echo $e;
        }
    }
}
