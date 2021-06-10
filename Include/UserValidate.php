<?php
    class UserValidate {
        public static function testarEmail($paramEmail) {
            $Sintaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($Sintaxe, $paramEmail)) {
                return true;
            }
            else {
                return false;
            }
        }

        public static function testarExisteUser($paramEmail) {
            $userDao = new UserDao();
            $user = $userDao->searchUser($paramEmail);
            if (count($user) == 0) {
                return true;
            } else {
                return false;
            }
        }
    }
