<?php

class TicketValidate {
    public static function testarAeroportoDestino($paramAeroportoDestino) {
        $ticketDao = new TicketDao();
        $airport = $ticketDao->searchAirport($paramAeroportoDestino);
        if (count($airport) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarData($paramData) {
        //comando futuro
 }
}
