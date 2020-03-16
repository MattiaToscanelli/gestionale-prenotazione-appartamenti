<?php

/**
 * Classe che mi permette di eseguire le query in modo sicuro.
 */
class Util{

    /**
     * Metodo per rendere "pulito" un input.
     * @param $data Il dato da revisionare.
     * @return string Il dato revisionato.
     */
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}