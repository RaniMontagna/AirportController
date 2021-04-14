<?php 

class Crew {
    var $id;
    var $nome;
    var $idade;
    var $email;
    var $senha;
    var $tipo;

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