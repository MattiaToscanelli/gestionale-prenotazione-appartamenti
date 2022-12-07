<?php

/**
 * Model per gestire il login.
 */
class LoginModel{

    /**
     * @var Database Connessione per il database.
     */
    private $connection;

    /**
     * Metodo costruttore senza parametri, instanza le varibili $connection e $util.
     */
    function __construct(){
        require_once "application/libs/database.php";
        $this->connection = new Database();
    }

    public function access($email, $password) {
        $result = $this->getUser($email);
        if (count($result) > 0) {
            if (password_verify($password, $result[0][DB_USER_PASSWORD])) {
                if ($result[0][DB_USER_TYPE] & 1) {
                    echo 1;
                    return $result; //Credenziali corrette e verificate
                } else {
                    echo 2; //Credenziali corrette ma non verificate
                }
            } else {
                echo 0; // Credenziali sbagliate
            }
        } else {
            echo 0;
        }
    }

    /**
     * Metodo utilizzato per ricavare tutte le info di un utente, dunque per effettuare il login.
     * @param $email La email dell'utente che vuole accedere.
     * @return array I dati dell'utente.
     */
    private function getUser($email){
        $selectAccess = "SELECT * FROM utente WHERE email=%s";
        $result = $this->connection->query($selectAccess, $email);
        return $result;
    }

}

?>