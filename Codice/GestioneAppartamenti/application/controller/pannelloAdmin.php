<?php

/**
 * Controller per il pannello admin.
 */
class PannelloAdmin{

    /**
     * Metodo per caricare la pagina di pannello admin. Verifica anche che l'utente che vuole visualizzare la pagina sia
     * un Gestore
     */
    public function index(){
        /*$this->checkAdmin();*/

        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        $users = $pam->getAllUsers();
        $news = $pam->getAllNews();
        $photos = $pam->getAllPhotos();

        require 'application/views/_template/header.php';
        require 'application/views/management/pannelloAdmin.php';
        require 'application/views/_template/footer.php';

    }

    /**
     * Metodo per ricevere tutti i dati di un utente.
     * @param $user Tutti i dati di un utente.
     */
    public function getUser(){
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->getUser(Util::test_input($_POST[EMAIL]));
        }
    }

    /**
     * Metodo per vericare che gli utenti che vogliono visualizzare questa pagina siano Gestori.
     */
    public function checkAdmin(){
        if(isset($_SESSION[SESSION_TYPE])){
            if(!($_SESSION[SESSION_TYPE]==7)){
                header("Location: ".URL."errore");
                exit;
            }
        }else{
            header("Location: ".URL."errore");
            exit;
        }
    }

    /**
     * Metodo per eliminare un utente.
     * @param $user la email dell'utente da eliminare.
     */
    public function deleteUser(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->delUser($_POST[EMAIL]);
        }else{
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per modificare un utente.
     * @param $user La email dell'utente da modificare.
     */
    public function modifyUser(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = json_decode($_POST["dataU"]);
            $data = array();
            array_push($data,Util::test_input($user->firstname));
            array_push($data,Util::test_input($user->surname));
            array_push($data,Util::test_input($user->street));
            array_push($data,Util::test_input($user->city));
            array_push($data,Util::test_input($user->nap));
            array_push($data,Util::test_input($user->type));
            array_push($data,Util::test_input($user->mobile_number));
            array_push($data,Util::test_input($user->landline_number));
            array_push($data,Util::test_input($user->office_number));
            array_push($data,Util::test_input($user->email));
            $pam->modifyUser($data);
        }else {
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per ricevere tutti i dati di una notizia.
     */
    public function getNews(){
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->getNews(Util::test_input($_POST[ID]));
        }else{
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per eliminare una notizia.
     */
    public function deleteNews(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->delNews($_POST[ID]);
        }else{
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per modificare una notizia.
     */
    public function modifyNews(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $news = json_decode($_POST["dataN"]);
            $data = array();
            array_push($data,Util::test_input($news->title));
            array_push($data,Util::test_input($news->text));
            array_push($data,Util::test_input($news->id));
            $pam->modifyNews($data);
        }else {
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per aggiungere una notizia.
     */
    public function addNews(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $news = json_decode($_POST["dataN"]);
            $data = array();
            array_push($data,Util::test_input($news->title));
            array_push($data,Util::test_input($news->text));
            $pam->addNews($data);
        }else {
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per aggiungere una foto.
     */
    public function addPhoto(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $photo = $_FILES["file"];
            $pam->addPhoto($photo);
        }else {
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per ricevere tutti i dati di una foto.
     */
    public function getPhoto(){
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->getPhoto(Util::test_input($_POST[ID]));
        }else{
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per eliminare una foto.
     */
    public function deletePhoto(){
        //$this->checkAdmin();
        require_once 'application/models/pannelloAdminModel.php';
        $pam = new PannelloAdminModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pam->delPhoto($_POST[ID]);
        }else{
            header("Location: ".URL."errore");
        }
    }
}

?>