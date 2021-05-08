<?php 

class Ticket {
    var $id;
    var $aeroportoDestino;
    var $dataSaida;
    var $preco;
    
    //Metódo para atribuir/buscar valores nas variavéis
    public function __construct() {}

    public function __set($propriedade, $valor) {
        $this->propriedade = $valor;
    }

    public function __get($propriedade) {
        return $this->propriedade;
    }
}

?>