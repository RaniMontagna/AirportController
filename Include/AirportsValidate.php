<?php

class AirportsValidate {
    public static function testarCep($paramCep) {
        //comando futuro
    }

    public static function testarNome($paramNome) {
        if (strlen($paramNome) < 5) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarPorte($paramPorte) {
        if ($paramPorte == "Medio" || $paramPorte == "Pequeno" || $paramPorte == "Grande") {
            return true;
        } else {
            return false;
        }
    }
}
?>