<?php

/**
 * Model per la pagina principale.
 */
class HomeModel{

    /**
     * @var Database Connessione per il database.
     */
    private $connection;

    /**
     * Metodo costruttore con 6 parametri. Instanzia le varibili $name, $surname, $number, $email, $password1 e $password2.
     * @param $name Il nome dell'utente.
     * @param $surname Il congnome dell'utente.
     * @param $number Il numero di telefono dell'utente.
     * @param $email La email dell'utente.
     * @param $password1 La password dell'utente.
     * @param $password2 Nuovamenre la password dell'utente.
     */
    public function __construct(){
        require_once "application/libs/database.php";
        $this->connection = new Database();
    }


    /**
     * Metodo per ricavare tutte le foto della home da mettere nel carosello.
     * @return array Tutti i percorsi delle foto.
     */
    public function getAllPathHomePicture(){
        $selectPicture = "SELECT percorso FROM foto WHERE tipo = 0";
        $pictures = $this->connection->query($selectPicture);
        return $pictures;
    }

    /**
     * Metodo per ricavare tutte le notizie da mettere nella pagina principale.
     * @return array Tutte le notizie.
     */
    public function getAllNews(){
        $selectNews = "SELECT * FROM notizia ORDER BY data DESC";
        $news = $this->connection->query($selectNews);
        return $news;
    }

}
?>