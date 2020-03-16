<?php


class ESession
{

    /**
     * Metodo che mi permette di distruggere la sessione. (usato per il logout)
     */
    public static function stop()
    {
        session_destroy();
    }

    /**
     * Metodo che mi permette di utilizzare la pagina cambia password.
     */
    public static function changePass()
    {
        unset($_SESSION[SESSION_CHANGE_PASSWORD]);
    }

    /**
     * Metodo che mi permette di gestire gli errori in modo visibile all'utente.
     */
    public static function err()
    {
        unset($_SESSION[SESSION_ERR]);
    }

    /**
     * Metodo che mi permette di svuotare la variabile di sessione utilizzata nel cambia password.
     */
    public static function email()
    {
        unset($_SESSION[SESSION_EMAIL]);
    }

    /**
     * Metodo che mi permette di svuotare la variabile di sessione utilizzata nella modifica di un utente.
     */
    public static function emailUser()
    {
        unset($_SESSION[SESSION_USER_EMAIL]);
    }

    /**
     * Metodo che mi permette di svuotare la variabile di sessione utilizzata nalla modifica di una notizia.
     */
    public static function idNews()
    {
        unset($_SESSION[SESSION_NEWS_ID]);
    }

}