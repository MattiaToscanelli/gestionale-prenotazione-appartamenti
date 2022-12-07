<?php


class CambiaPassword
{
    public function index()
    {
        if(!isset($_SESSION[SESSION_CHANGE_PASSWORD])) {
            header("Location: " . URL . "errore");
        }
        require_once "application/views/_template/header.php";
        require_once "application/views/login/cambia-password.php";
        require_once "application/views/_template/footer.php";
    }

    /**
     * Metodo per confermare la email.
     * @param $hash La hash per identificare la persona che ha verificato la email.
     * @param $email La email della persona che ha verificato la email.
     */
    public function resetPassword($hash = null,$email= null){
        if(($email != null) && ($hash != null)) {
            require_once 'application/models/confermaModel.php';
            $conferma_model = new ConfermaModel();
            if($conferma_model->changePassword(Util::test_input($hash), Util::test_input($email))){
                $_SESSION[SESSION_CHANGE_PASSWORD] = Util::test_input($email);
                header("Location: " . URL . "cambiaPassword");
            }else{
                header("Location: " . URL . "errore");
            }
        }else{
            header("Location: " . URL . "errore");
        }
    }

    /**
     * Metodo per modificare la password
     */
    public function modifyPassword(){
        require 'application/models/cambiaPasswordModel.php';
        $cpm = new CambiaPasswordModel();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($cpm->modify($_SESSION[SESSION_CHANGE_PASSWORD],Util::test_input($_POST[PASSWORD]), Util::test_input($_POST[RE_PASSWORD]))){
                require_once 'application/libs/eSession.php';
                ESession::changePass();
                header("Location: ".URL."passwordCambiata");
            }else{
                header("Location: ".URL."errore");
            }
        }else{
            header("Location: " . URL . "errore");
        }
    }
}