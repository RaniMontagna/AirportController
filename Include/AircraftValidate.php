<?php
class AircraftValidate {
    public static function testarPassageiros($paramPassageiros) {
        if ($paramPassageiros < 0 || $paramPassageiros > 2000) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarTipoMotor($paramTipoMotor) {
        if ($paramTipoMotor == "Turboélice" || $paramTipoMotor == "Jato" || $paramTipoMotor == "Eletricidade" || $paramTipoMotor == "Supersônico" || $paramTipoMotor == "Pistão" || $paramTipoMotor == "Turbofan") {
            return true;
        } else {
            return false;
        }
    }

    public static function testarCompania($paramCompania) {
        $aircraftDao = new AircraftDao();
        $companies = $aircraftDao->searchCompany($paramCompania);
        if (count($companies) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
