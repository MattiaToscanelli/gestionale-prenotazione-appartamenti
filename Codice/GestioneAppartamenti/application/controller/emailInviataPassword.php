<?php


class EmailInviataPassword
{
    public function index()
    {
        require_once "application/views/_template/header.php";
        require_once "application/views/login/email-inviata-password.php";
        require_once "application/views/_template/footer.php";
    }
}