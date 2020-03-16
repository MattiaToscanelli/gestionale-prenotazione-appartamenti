<?php

class Database extends MeekroDB{
    public function __construct()
    {
        try{
            parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }catch (Exception $e){
            header("Location:" . URL . "errore");
        }
    }
}

?>