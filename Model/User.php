<?php

class User {
    var $id;
    var $email;
    var $password;

    //Método para atribuir/buscar valores das variáveis
    public function __construct() {}
    
    public function __set($propriedade, $valor) {
        $this->propriedades = $valor;
    }

    public function __get($propriedade) {
        return $this->propriedade;
    } 
}
