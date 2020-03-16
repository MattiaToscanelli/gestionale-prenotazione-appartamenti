<?php


class Login
{
    public function index()
    {
        require_once "application/views/_template/header.php";
        require_once "application/views/login/login.php";
        require_once "application/views/_template/footer.php";
    }

    /**
     * Metodo per effettuare il login.
     */
    public function access() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = Util::test_input($_POST[EMAIL]);
            $password = $_POST[PASSWORD];
            require_once 'application/models/loginModel.php';
            $loginModel = new LoginModel();
            $result = $loginModel->access($email,$password);
            if ($result != null){
                $_SESSION[SESSION_TYPE] = $result[0][DB_USER_TYPE];
                $_SESSION[SESSION_EMAIL] = $email;
            }
        }else{
            header("Location:" . URL . "errore");
        }
    }
}