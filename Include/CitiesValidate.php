<?php

class CitiesValidate {
    public static function testarEstado($paramEstado) {
        if (strlen($paramEstado) < 2 || strlen($paramEstado) > 2) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarCEP($paramCEP) {
        if (strlen($paramCEP) < 8 || strlen($paramCEP) > 8) {
            return false;
        } else {
            return true;
        }
    }
}
?>