<?php

/**
 * Configurazione
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configurazione di : Error reporting
 * Utile per vedere tutti i piccoli problemi in fase di sviluppo, in produzione solo quelli gravi
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Configurazione di : URL del progetto
 */
define('URL', 'http://localhost/ProgettoAppartamenti2/Codice/GestioneAppartamenti/');

/**
 * Costate per l'accesso per il database.
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'gestione_appartamenti_admin');
define('DB_PASS', 'Appartamenti&1');
define('DB_NAME', 'gestione_appartamenti');

/**
 * Costanti di accesso per web mail.
 */
define('EMAIL_EMAIL', 'gestione.appartamenti2020@gmail.com');
define('PASSWORD_MAIL', 'Appartamenti&1');

/**
 * Costanti per il form di registrazione.
 */
define('FIRST_NAME', 'firstname');
define('SURNAME', 'surname');
define('STREET', 'street');
define('NAP', 'nap');
define('TYPE', 'type');
define('CITY', 'city');
define('MOBILE_NUMBER', 'mobile_number');
define('OFFICE_NUMBER', 'office_number');
define('LANDLINE_NUMBER', 'landline_number');
define('EMAIL', 'email');
define('PASSWORD', 'password');
define('RE_PASSWORD', 're_password');
define('ID', 'id');

/**
 * Costante per mostrare errori lato server.
 */
define('ERR', 'err');

/**
 * Costanti per accedere velocemente ai dati dell'utente.
 */
define('SESSION_CHANGE_PASSWORD', 'change_password');
define('SESSION_EMAIL', 'email');
define('SESSION_TYPE', 'tipo');

/**
 * Costanti per la gestione del pannello admin.
 */
define('SESSION_USER_EMAIL', 'user_email');
define('SESSION_NEWS_ID', 'news_id');
define('SESSION_PHOTO_ID', 'news_id');

/**
 * Costanti per accedere ai dati del database.
 */
define('DB_USER_PASSWORD', 'password');
define('DB_USER_TYPE', 'tipo');
define('DB_USER_NAME', 'nome');
define('DB_USER_SURNAME', 'cognome');
define('DB_USER_STREET', 'via');
define('DB_USER_CITY', 'citta');
define('DB_USER_NAP', 'cap');
define('DB_USER_MOBILE_NUMBER', 'numero_mobile');
define('DB_USER_OFFICE_NUMBER', 'numero_ufficio');
define('DB_USER_LANDLINE_NUMBER', 'numero_fisso');
define('DB_USER_EMAIL', 'email');
define('DB_PATH_PHOTO', 'percorso');
define('DB_ID_PHOTO', 'id');
define('DB_NEWS_ID', 'id');
define('DB_NEWS_DATE', 'data');
define('DB_NEWS_TITLE', 'titolo');
define('DB_NEWS_TEXT', 'testo');

/**
 * Costanti per i sistemi operativi.
 */
define('OS_OSX', 1);
define('OS_WIN', 2);
define('OS_LINUX', 3);
define('OS_UNKNOWN', 4);

/**
 * Importo la classe per i metodi utili.
 */
require_once 'application/libs/util.php';
require_once 'application/libs/eSession.php';
