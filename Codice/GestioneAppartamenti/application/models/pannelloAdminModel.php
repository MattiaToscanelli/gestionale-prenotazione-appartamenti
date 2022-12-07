<?php

/**
 * Model oer gestire il pannello admin.
 */
class PannelloAdminModel{

    /**
     * @var Database Connessione per il database.
     */
    private $connection;

    /**
     * @var Validator Validatore degli input.
     */
    private $validator;

    /**
     * Metodo costruttore senza parametri, instanza le varibili $connection, $util e $connection.
     */
    function __construct(){
        require_once "application/libs/database.php";
        require_once "application/libs/validator.php";
        $this->connection = new Database();
        $this->validator = new Validator($this->connection);
    }

    /**
     * Metodo per ricavare tutti i dati degli utenti verificati.
     * @return array I dati degli utenti verificati.
     */
    public function getAllUsers(){
        $selectUsers = "SELECT * FROM utente WHERE Mod(tipo,2)<> 0 ORDER BY cognome";
        $users = $this->connection->query($selectUsers);
        return $users;
    }

    /**
     * Metodo per ricavare tutti i dati di un utente.
     * @param $email La email dell'utente da visualizzare.
     * @return array I dati dell'utente.
     */
    public function getUser($email){
        $selectUser = "SELECT * FROM utente WHERE email=%s";
        $user = $this->connection->query($selectUser,$email);
        $_SESSION[SESSION_USER_EMAIL] = $user[0]["email"];
        echo json_encode($user[0]);
    }

    /**
     * Metodo per modificare un utente.
     * @param array $data array dei dati da modificare di un utente.
     */
    function modifyUser(array $data){
        if($this->checkAll($data)) {
            ESession::emailUser();
            $selectUsers = "UPDATE utente SET nome=%s, cognome=%s,
                        via=%s, citta=%s, cap=%i, tipo=%i, numero_mobile=%s, numero_fisso=%s, numero_ufficio=%s
                        WHERE email=%s";
            $this->connection->query($selectUsers, $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9]);
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Metodo per eliminare un utente.
     * @param $email La email dell'utente da eliminare.
     */
    public function delUser($email){
        if($_SESSION[SESSION_USER_EMAIL] == $email){
            $selectUser = "DELETE FROM utente WHERE email=%s";
            $this->connection->query($selectUser,$email);
            echo 1;
        }else{
            echo 0;
        }
        ESession::emailUser();
    }

    /**
     * Metodo per verificare che tutti gli input nella modifica di un utente nella pagina di amminstrazione siano validi.
     * @return bool True se sono tutti validi, False se non sono validi.
     */
    function checkAll($data){
        return $this->validator->checkName($data[0]) && $this->validator->checkName($data[1]) &&
            $this->validator->checkStreet($data[2]) && $this->validator->checkName($data[3]) &&
            $this->validator->checkNap($data[4]) && $this->validator->checkType($data[5]) &&
            $this->validator->checkPhoneNumber($data[6]) &&
            ($this->validator->checkPhoneNumber($data[7]) || $this->validator->isNullOrEmptyString($data[7])) &&
            ($this->validator->checkPhoneNumber($data[8]) || $this->validator->isNullOrEmptyString($data[8])) &&
            $_SESSION[SESSION_USER_EMAIL] == $data[9];
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

    /**
     * Metodo per ricavare tutti i dati di una notizia.
     * @param $id L'id della notizia da visualizzare.
     * @return array I dati della notizia.
     */
    public function getNews($id){
        $selectNews = "SELECT * FROM notizia WHERE id=%i";
        $news = $this->connection->query($selectNews,$id);
        $_SESSION[SESSION_NEWS_ID] = $news[0]["id"];
        echo json_encode($news[0]);
    }

    /**
     * Metodo per aggiungere una notizia
     * @param array $data array dei dati da aggiungere di una notizia.
     */
    function addNews(array $data){
        if($this->checkAllNews($data)) {
            ESession::idNews();
            $today = date("Y-m-d", strtotime( "now" ));
            $addNews = "INSERT INTO notizia (id,titolo,testo,data) VALUES (null,%s,%s,'$today')";
            $this->connection->query($addNews, $data[0], $data[1]);
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Metodo per modficiare una notizia
     * @param array $data array dei dati da modificare di una notizia.
     */
    function modifyNews(array $data){
        if($this->checkAllNews($data) && $_SESSION[SESSION_NEWS_ID] == $data[2]) {
            ESession::idNews();
            $modifyNews = "UPDATE notizia SET titolo=%s, testo=%s WHERE id=%i";
            $this->connection->query($modifyNews, $data[0], $data[1], $data[2]);
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Metodo per eliminare una notizia.
     * @param $id L'id della notizia da eliminare.
     */
    public function delNews($id){
        if($_SESSION[SESSION_NEWS_ID] == $id){
            ESession::idNews();
            $deleteNews = "DELETE FROM notizia WHERE id=%i";
            $this->connection->query($deleteNews,$id);
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Metodo per verificare che tutti gli input nella registrazione sono validi.
     * @return bool True se sono tutti validi, False se non sono validi.
     */
    function checkAllNews($data){
        return $this->validator->checkTitle($data[0]) && $this->validator->checkTextArea($data[1]);
    }

    /**
     * Metodo per ricavare tutte le foto da mettere nella pagina principale.
     * @return array Tutte le foto.
     */
    public function getAllPhotos(){
        $selectPhotos = "SELECT * FROM foto WHERE tipo=0";
        $photos = $this->connection->query($selectPhotos);
        return $photos;
    }

    /**
     * Metodo per aggiungere una foto
     * @param array $data array dei dati da aggiungere di una foto.
     */
    function addPhoto($photo){
        $target_dir = "img/";
        $target_file = $target_dir.basename($photo["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(!(getimagesize($photo["tmp_name"]) !== false)) {
            $uploadOk = 0;
        }
        if ($photo["size"] > 5000000) {
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        $hash = hash('sha256', basename($photo["name"] . time()));
        $target_file = $target_dir.$hash.".".$imageFileType;
        if ($uploadOk == 1) {
            if (move_uploaded_file($photo["tmp_name"], $target_file)) {
                $os = $this->getOS();
                if($os == OS_WIN){
                    exec( 'icacls "'.$target_file.'" /q /c /reset' );
                }else if($os == OS_LINUX || $os == OS_OSX){
                    chmod($target_file, 0777);
                }else{
                    echo 2;
                    exit;
                }
                $insertPhoto = "INSERT INTO foto (id,tipo,percorso) VALUES (null,0,%s)";
                $this->connection->query($insertPhoto, $target_file);
                echo 1;
            } else {
                echo 3;
            }
        } else {
            echo  0;
        }
    }

    /**
     * Metodo per sapere quale sistema operativo sta girando il servizio di php
     * @return mixed Il sistema operativo
     */
    public function getOS() {
        if(stristr(PHP_OS, 'DAR')) {
            return OS_OSX;
        }else if(stristr(PHP_OS, 'WIN')) {
            return OS_WIN;
        }else if(stristr(PHP_OS, 'LINUX')) {
            return OS_LINUX;
        }else{
            return OS_UNKNOWN;
        }
    }

    /**
     * Metodo per eliminare una foto.
     * @param $id L'id della foto da eliminare.
     */
    public function delPhoto($id){
        if($_SESSION[SESSION_PHOTO_ID] == $id){
            ESession::idNews();
            $selectPhoto = "SELECT percorso FROM foto WHERE id=%i";
            $photo = $this->connection->query($selectPhoto,$id);
            $deletePhoto = "DELETE FROM foto WHERE id=%i";
            $this->connection->query($deletePhoto,$id);
            unlink($photo[0][DB_PATH_PHOTO]);
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Metodo per ricavare tutti i dati di una foto.
     * @param $id L'id della doto da visualizzare.
     * @return array I dati della foto.
     */
    public function getPhoto($id){
        $selectPhoto = "SELECT * FROM foto WHERE id=%i";
        $photos = $this->connection->query($selectPhoto,$id);
        $_SESSION[SESSION_PHOTO_ID] = $photos[0]["id"];
        echo json_encode($photos[0]);
    }
}

?>