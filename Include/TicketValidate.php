<?php

class TicketValidate {
    public static function testarAeroportoDestino($paramAeroportoDestino) {
        //comando futuro
    }

    public static function testarData($paramData) {
        //comando futuro
 }
    public static function testarQtdPassageiros($paramQtdPassageiros) {
        if ($paramQtdPassageiros == 1 ||$paramQtdPassageiros == 2 ||$paramQtdPassageiros == 3 ||$paramQtdPassageiros == 4) {
            return true;
        } else {
            return false;
        }
    }
}
?>