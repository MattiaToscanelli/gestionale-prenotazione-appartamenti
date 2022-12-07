<?php

/**
 * Classe utile per la Validazione dei dati.
 */
class Validator
{
    /**
     * @var Database Connessione per il database.
     */
    private $connection;

    /**
     * @var Util Oggetto che mi aiuta per eseguire le query;
     */
    private $util;

    /**
     * Metodo costrruttore con un parametro, instazia le variabili $connection e $util.
     * @param $connection La connessione al database.
     */
    public function __construct($connection){
        $this->connection = $connection;
        $this->util = new Util($connection);
    }

    /**
     * Metodo per verificare un nome.
     * @param $val Il nome da verificare.
     * @return bool True se il nome è valido, False non è valido.
     */
    function checkName($val){
        return (preg_match('/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/', $val) && count($val)<=50);
    }

    /**
     * Metodo per verificare una via.
     * @param $val La via da verificare.
     * @return bool True se la via è valida, False non è valida.
     */
    function checkStreet($val){
        return (preg_match('/^[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/', $val) && count($val)<=50);
    }

    /**
     * Metodo per verificare se una email esiste già nel database.
     * @param $val La email da verificare.
     * @return bool True se la email esiste, False se non esiste.
     */
    function checkEmailExists($val){
        $selectUsers = "SELECT nome FROM utente WHERE email=%s";
        $users = $this->connection->query($selectUsers, $val);
        return count($users)==0;
    }

    /**
     * Metodo per verificare se la email appartiene ad un sito di spam.
     * @param $val La email da verificare.
     * @return bool True se la email va bene, False se non va bene.
     */
    function checkEmailDomain($val){
        $email = explode("@", $val);
        if(count($email) > 1){
            return (strpos(file_get_contents("application/libs/blockDomain.txt"),"\n".$email[1]) !== false);
        }else{
            return false;
        }
    }

    /**
     * Metodo per verificare se una email è valida.
     * @param $val La email da verificare.
     * @return bool True se la email è valida, False se non è valida.
     */
    function checkEmail($val){
        return preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $val) && $this->checkEmailExists($val);
    }

    /**
     * Metodo per verificare se un numero di telefono è valido.
     * @param $val Il numero da verificare.
     * @return false|int True se il numero è valido, False se non è valdio.
     */
    function checkPhoneNumber($val){
        $val = str_replace(" ", "", $val);
        $val = str_replace("-", "", $val);
        return preg_match('/^[\+]?[0-9-#]{10,14}$/', $val);
    }

    /**
     * Metodo per verificare se il cap è valido.
     * @param $val Il cap da verificare.
     * @return false|int True se il cap è valido, False se non è valdio.
     */
    function checkNap($val){
        $val = str_replace(" ", "", $val);
        $val = str_replace("-", "", $val);
        return preg_match('/^[0-9]{4,5}$/', $val);
    }

    /**
     * Metodo per verificare se due password sono uguali e rispetta i criteri di sicurezza.
     * @param $val1 La prima password.
     * @param $val2 La password ripetuta.
     * @return bool True se le password sono uguali e rispettano i criteri di sicurezza, False se non sono uguali o
     * non rispettano i criteri.
     */
    function checkPassword($val1,$val2){
        $regexLetter = '/[a-zA-Z]/';
        $regexDigit   = '/\d/';
        $regexSpecial = '/[^a-zA-Z\d]/';
        return (preg_match($regexDigit,$val1) || preg_match($regexSpecial,$val1)) &&
            preg_match($regexLetter,$val1) && strlen($val1) >= 8 &&
            $val1 == $val2;
    }

    /**
     * Metodo per verificae il tipo di un utente.
     * @param $val Il tipo da verificare.
     * @return bool True se il tipo è valido, False se non è valido.
     */
    function checkType($val){
        return $val == 1 || $val == 3 || $val == 7;
    }

    /**
     * Metodo per verificare se una stringa è vuota.
     * @param $str La stringa da verificare.
     * @return bool True se la string è vuota, False se non è vuotas.
     */
    function isNullOrEmptyString($val){
        return (!isset($val) || trim($val) === '');
    }

    /**
     * Metodo per controllare il titolo di una notizia.
     * @param $val Il titolo da controllare.
     * @return bool True se è valido, False se non è valido.
     */
    function checkTitle($val){
        return (preg_match('/^[0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2}[0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/', $val) && count($val)<=100);
    }

    /**
     * Metodo per verificare una via.
     * @param $val La via da verificare.
     * @return bool True se la via è valida, False non è valida.
     */
    function checkTextArea($val){
        return (preg_match('/^[\r\n0-9a-zA-Z!?()%*"+^$£&àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/', $val));
    }

}