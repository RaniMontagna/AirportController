<?php 

class Aircraft {
    var $id;
    var $nome;
    var $marca;
    var $tipoMotor;
    var $maxPassageiros;
    var $compania;

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