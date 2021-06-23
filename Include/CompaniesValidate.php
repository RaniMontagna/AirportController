<?php

class CompaniesValidate
{
    public static function testarCNPJ($paramCNPJ)
    {
        if (strlen($paramCNPJ) < 18 || strlen($paramCNPJ) > 18) {
            return false;
        } else {
            return true;
        }
    }

    public static function testarRazaoSocial($paramRazaoSocial)
    {

        $searchEireli = 'Eireli';
        $searchLtda = 'Ltda';

        if (preg_match("/{$searchEireli}/i", $paramRazaoSocial)) {
            return true;
        } else if (preg_match("/{$searchLtda}/i", $paramRazaoSocial)) {
            return true;
        } else {
            return false;
        }
    }

    public static function testarExisteCNPJ($paramCompania)
    {
        $companiesDao = new CompaniesDao();
        $companies = $companiesDao->searchCompany($paramCompania);
        if (count($companies) == 0) {
            return true;
        } else {
            return false;
        }
    }
}
