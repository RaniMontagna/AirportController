<?php
    include '../Persistence/ConnectionDB.php';

    class TicketDAO {
        private $connection = null;

        public function __construct() {
            $this->connection =ConnectionDB::getInstance();
        }

        public function create($ticket) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO tickets(aeroportoDestino, dataSaida, preco) VALUES (?,?,?)"
                );

                $statement->bindValue(1, $ticket->aeroportoDestino);
                $statement->bindValue(2, $ticket->dataSaida);
                $statement->bindValue(3, $ticket->preco);

                $statement->execute();

                // var_dump($statement); die();

                //Encerra a conexão com o DB
                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao inserir um novo ticket!";
                echo $e;
            }
        }

        public function search() {
            try {
                $statement = $this->connection->prepare("SELECT * FROM tickets");
                $statement->execute();
                $dados = $statement->fetchAll();
                $this->connection = null;
    
                return $dados;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao buscar as passagens";
                echo $e;
            }
        }

        public function delete($id) {
            try {
                $statement = $this->connection->prepare("DELETE FROM tickets WHERE id = ?");
                $statement->bindValue(1, $id);
                $statement->execute(); 

                $this->connection = null;
            } catch (PDOException $e) {
                echo "Ocorreram erros ao deletar a passagem";
                echo $e;
            }
        }
    }


?>