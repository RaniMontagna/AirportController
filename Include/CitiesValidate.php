<?php

class CitiesValidate {
    public static function testarEstado($paramEstado) {
        if (strlen($paramEstado) < 2 || strlen($paramEstado) > 2) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarTamanhoCEP($paramCEP) {
        if (strlen($paramCEP) < 8 || strlen($paramCEP) > 8) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarExisteCEP($paramCEP) {
        $citiesDao = new CitiesDao();
        $city = $citiesDao->searchCity($paramCEP);
        if (count($city) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
