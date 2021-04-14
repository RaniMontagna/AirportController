<?php

class CrewValidate {
    public static function testarIdade($paramIdade) {
        if ($paramIdade < 18) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarEmail($paramEmail) {
        $Sintaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if (preg_match($Sintaxe, $paramEmail)) {
            return true;
        } else {
            return false;
        }
    }

    public static function testarSenha($paramSenha) {
        if (strlen($paramSenha) < 8) {
            return false;
        } else {
            return true;
        }
    }
}

?>