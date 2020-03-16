<?php


class PasswordDimenticata
{
    public function index()
    {
        require_once "application/views/_template/header.php";
        require_once "application/views/login/password-dimenticata.php";
        require_once "application/views/_template/footer.php";
    }

    /**
     * Metodo per invire la mail di recupero password.
     */
    public function sendEmail()
    {
        if ($_SERVER["REQUEST_METHOD"] = "POST") {
            require 'application/models/passwordDimeticataModel.php';
            $pdm = new PasswordDimeticataModel(Util::test_input($_POST[EMAIL]));
            if ($pdm->sendEmail()) {
                header("Location: " . URL . "emailInviataPassword");
            } else {
                header("Location: " . URL . "errore");
            }
        } else {
            header("Location: " . URL . "errore");
        }
    }
}