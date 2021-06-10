<?php

class Travel {
    var $id;
    var $aviao;
    var $aeroportoDestino;
    var $dataSaida;

    //Método para atribuir/buscar valores das variáveis
    public function __construct() {}
    
    public function __set($propriedade, $valor) {
        $this->propriedades = $valor;
    }

    public function __get($propriedade) {
        return $this->propriedade;
    } 
}
