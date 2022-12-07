<?php


class Registrazione
{
    public function index()
    {
        require_once "application/views/_template/header.php";
        require_once "application/views/login/registrazione.php";
        require_once "application/views/_template/footer.php";
    }

    /**
     * Metodo per inserire un nuovo utente nel database.
     */
    public function insert(){
        require_once 'application/models/registrazioneModel.php';
        $name = $surname = $street = $nap = $city = $mNumber = $oNumber = $lNumber = $email = $password1 = $password2 = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = Util::test_input($_POST[FIRST_NAME]);
            $surname = Util::test_input($_POST[SURNAME]);
            $street = Util::test_input($_POST[STREET]);
            $nap = Util::test_input($_POST[NAP]);
            $city = Util::test_input($_POST[CITY]);
            $mNumber = Util::test_input($_POST[MOBILE_NUMBER]);
            $oNumber = Util::test_input($_POST[OFFICE_NUMBER]);
            $lNumber = Util::test_input($_POST[LANDLINE_NUMBER]);
            $email = Util::test_input($_POST[EMAIL]);
            $password1 = $_POST[PASSWORD];
            $password2 = $_POST[RE_PASSWORD];
            $rm = new RegistrazioneModel($name, $surname, $street, $nap, $city, $mNumber, $oNumber, $lNumber, $email, $password1, $password2);
            $response = $rm->insertUser();
            if($response){
                header("Location: ".URL."emailInviata");
            }else{
                header("Location: ".URL."errore");
            }
        }else{
            header("Location: ".URL."errore");
        }
    }

    /**
     * Metodo per verificare se la email inserita nella registarzione è già utilizzata da qualcun'altro.
     */
    public function checkEmail(){
        require_once 'application/models/registrazioneModel.php';
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = Util::test_input($_POST[EMAIL]);
            RegistrazioneModel::checkEmail($email);
        }else{
            header("Location: ".URL."errore");
        }
    }
}