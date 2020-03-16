<?php

// carico il file di configurazione
require 'application/config/config.php';

// carico le classi dell'applicazione
require 'application/libs/application.php';

// carico classe per database
require_once 'application/libs/meekrodb-2.3/db.class.php';

//Avvio la sessione
session_start();

// faccio partire l'applicazione
$app = new Application();
