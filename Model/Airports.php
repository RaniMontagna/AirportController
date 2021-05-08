<?php 

class Airports {
    var $id;
    var $nome;
    var $porte;
    var $distancia;
    var $cep;

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