<?php

class CitiesValidate {
    public static function testarEstado($paramEstado) {
        if (strlen($paramEstado) < 2 || strlen($paramEstado) > 2) {
            return false;
        } else {
            return true;
        }
    }
}
?>