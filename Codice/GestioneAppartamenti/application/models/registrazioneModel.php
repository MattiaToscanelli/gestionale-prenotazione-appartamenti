<?php

/**
 * Model per la registrazione degli utenti.
 */
class RegistrazioneModel{

    /**
     * @var Il Nome dell'utente.
     */
    private $name = "";

    /**
     * @var Il Cognome dell'utente.
     */
    private $surname = "";

    /**
     * @var La via dell'utente.
     */
    private $street = "";

    /**
     * @var Il cap dell'utente.
     */
    private $nap = "";

    /**
     * @var La città dell'utente.
     */
    private $city = "";

    /**
     * @var Il Numero di telefono mobile dell'utente.
     */
    private $mNumber = "";

    /**
     * @var Il Numero di telefono fisso dell'utente.
     */
    private $lNumber = null;

    /**
     * @var Il Numero di telefono ufficio dell'utente.
     */
    private $oNumber = null;

    /**
     * @var La|string Email dell'utente.
     */
    private $email = "";

    /**
     * @var La|string Password dell'utente.
     */
    private $password1 = "";

    /**
     * @var Nuovamenre|string Nuovamente la passwor dell'utente.
     */
    private $password2 = "";

    /**
     * @var Database Connessione al database.
     */
    private $connection;

    /**
     * @var Validator Validatore degli input.
     */
    private $validator;

    /**
     * @var Util Oggetto che mi aiuta per eseguire le query;
     */
    private $util;

    /**
     * Metodo costruttore con 11 parametri. Instanzia le varibili $name, $surname, $street, $nap, $city, $mNumber,
     * $oNumber, $lNumber, $email, $password1 e $password2.
     * @param $name Il nome dell'utente.
     * @param $surname Il congnome dell'utente.
     * @param $street La via dell'utente.
     * @param $nap Il CAP dell'utente.
     * @param $city La città dell'utente.
     * @param $mNumber Il numero di telefono mobile dell'utente.
     * @param $oNumber Il numero di telefono d'ufficio dell'utente.
     * @param $lNumber Il numero di telefono fisso dell'utente.
     * @param $email La email dell'utente.
     * @param $password1 La password dell'utente.
     * @param $password2 Nuovamenre la password dell'utente.
     */
    public function __construct($name, $surname, $street, $nap, $city, $mNumber, $oNumber, $lNumber, $email, $password1, $password2){
        require_once "application/libs/database.php";
        require_once "application/libs/validator.php";
        $this->connection = new Database();
        $this->name = $name;
        $this->surname = $surname;
        $this->street = $street;
        $this->nap = $nap;
        $this->city = $city;
        $this->mNumber = $mNumber;
        $this->oNumber = $oNumber;
        $this->lNumber = $lNumber;
        $this->email = $email;
        $this->password1 = $password1;
        $this->password2 = $password2;
        $this->validator = new Validator($this->connection);
        $this->util = new Util($this->connection);
    }


    /**
     * Metodo per verificare che tutti gli input nella registrazione sono validi.
     * @return bool True se sono tutti validi, False se non sono validi.
     */
    function checkAll(){
        return $this->validator->checkName($this->name) && $this->validator->checkName($this->surname) &&
            $this->validator->checkStreet($this->street) && $this->validator->checkNap($this->nap) &&
            $this->validator->checkName($this->city) && $this->validator->checkPhoneNumber($this->mNumber) &&
            ($this->validator->checkPhoneNumber($this->oNumber) || $this->validator->isNullOrEmptyString($this->oNumber)) &&
            ($this->validator->checkPhoneNumber($this->lNumber) || $this->validator->isNullOrEmptyString($this->lNumber)) &&
            $this->validator->checkEmail($this->email) && $this->validator->checkEmailExists($this->email) &&
            !$this->validator->checkEmailDomain($this->email) && $this->validator->checkPassword($this->password1,$this->password2);
    }

    /**
     * Metodo per inserire un utente all'interno del database.
     * @return bool True se la query è andata a buon fine, False se non è andata a buon fine.
     */
    function insertUser(){
        if($this->checkAll()) {
            $password = password_hash($this->password1, PASSWORD_DEFAULT);
            try {
                $hash = hash('sha256', random_bytes(8) . $this->email);
                require 'application/libs/sendMail.php';
                $body = "Benvenuto/a $this->name $this->surname,<br>
                         ti rigranzio per esserti iscritto su FastRent. Manca solo un piccolo passaggio per incominciare ad 
                         usare il sito, devi verificare la tua email!<br><br>
                         <a href='" . URL . "conferma/confirm/$hash/$this->email'> Per verificare la tua mail clicca questo link!</a>";
                try {
                    $s = new SendMail();
                    $s->mailSend($this->email, "Verifica la tua email", $body);
                    $insertUser = "INSERT INTO utente (email,nome,cognome,via,citta,cap,tipo,password,hash_email,numero_mobile,
                                    numero_fisso,numero_ufficio) VALUES (%s,%s,%s,%s,%s,%i,%i,%s,%s,%s,%s,%s)";
                    if ($this->validator->isNullOrEmptyString($this->lNumber)) {
                        $this->lNumber = null;
                    }
                    if ($this->validator->isNullOrEmptyString($this->oNumber)) {
                        $this->oNumber = null;
                    }
                    $this->connection->query($insertUser, $this->email, $this->name, $this->surname, $this->street, $this->city,
                        $this->nap, 0, $password, $hash, $this->mNumber, $this->lNumber, $this->oNumber);
                    return true;
                } catch (Exception $e) {
                    return false;
                }
            }catch (Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Metodo utilizzato per sapere se la email inserita nella registrazione è già utilizzata.
     * @param $email La email dell'utente che vuole registrarsi.
     */
    public static function checkEmail($email){
        require_once "application/libs/database.php";
        require_once "application/libs/validator.php";
        $connection = new Database();
        $validator = new Validator($connection);
        $ee = $validator->checkEmailExists($email);
        $ed = !$validator->checkEmailDomain($email);
        if($ee && $ed){
            echo 1;
        }else{
            echo 0;
        }
    }
}
?>