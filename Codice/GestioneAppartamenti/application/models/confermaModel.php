<?php

/**
 * Model per confermare la email.
 */
class ConfermaModel{

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

    /**
     * Metodo per confermare la email.
     * @param $hash La hash per identificare la persona che ha verificato la email.
     * @param $email La email della persona che ha verificato la email.
     * @return bool True se la email è stata confermata, False se non è stata confermata.
     */
    function confirmEmail($hash,$email){
        $selectUsers = "SELECT * FROM utente WHERE email=%s AND hash_email=%s";
        $result = $this->connection->query($selectUsers, $email, $hash);
        if($result != null) {
            $updateUsers = "UPDATE utente SET hash_email='0', tipo=1 WHERE email=%s";
            $this->connection->query($updateUsers, $email);;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Metodo per confermare la email quando si vuole cambiare la password.
     * @param $hash La hash per identificare la persona che ha verificato la email.
     * @param $email La email della persona che vuole cambiare password.
     * @return bool True se l'identificazione dell'utente è andato a buone fine, False se non è andato a buon fine.
     */
    function changePassword($hash,$email){
        $selectUsers = "SELECT * FROM utente WHERE email=%s AND hash_email=%s";
        $result = $this->connection->query($selectUsers, $email, $hash);
        if($result != null) {
            $updateUsers = "UPDATE utente SET hash_email='0' WHERE email=%s";
            $this->connection->query($updateUsers, $email);;
            return true;
        }else{
            return false;
        }
    }
}