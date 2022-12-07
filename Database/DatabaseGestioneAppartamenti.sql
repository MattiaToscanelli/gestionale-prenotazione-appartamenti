DROP DATABASE IF EXISTS gestione_appartamenti;
CREATE DATABASE gestione_appartamenti;
USE gestione_appartamenti;

DROP TABLE IF EXISTS utente;
CREATE TABLE utente(
	email VARCHAR(100) PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	cognome VARCHAR(50) NOT NULL,
	via VARCHAR(50) NOT NULL,
	citta VARCHAR(50) NOT NULL,
	cap INT(5) NOT NULL,
	tipo INT(4) NOT NULL,
	password VARCHAR(100) NOT NULL,
	hash_email VARCHAR(100) NOT NULL,
	numero_mobile VARCHAR(15) NOT NULL,
	numero_fisso VARCHAR(15) DEFAULT NULL,
	numero_ufficio VARCHAR(15) DEFAULT NULL 
);

DROP TABLE IF EXISTS appartamento;
CREATE TABLE appartamento(
	id INTEGER auto_increment PRIMARY KEY,
	titolo VARCHAR(50) NOT NULL,
	via VARCHAR(50) NOT NULL,
	citta VARCHAR(50) NOT NULL,
	cap INT(5) NOT NULL,
	locali FLOAT(2,1) NOT NULL,
	prezzo_mensile INT(10) DEFAULT NULL,
	prezzo_giornaliero INT(10) DEFAULT NULL,
	ammobiliato TINYINT(1) NOT NULL,
	posteggio TINYINT(1) NOT NULL,
	fumatori TINYINT(1) NOT NULL,
	animali TINYINT(1) NOT NULL,
	bambini TINYINT(1) NOT NULL,
	commenti TEXT DEFAULT NULL,
	disponibilita TINYINT(1) NOT NULL
);

DROP TABLE IF EXISTS foto;
CREATE TABLE foto(
	num INT(2),
	tipo INT(1),
	id_appartamento INTEGER,
	percorso VARCHAR(100) NOT NULL,
	FOREIGN KEY (id_appartamento) 
		REFERENCES appartamento(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (num, tipo, id_appartamento)
);

DROP TABLE IF EXISTS accessorio;
CREATE TABLE accessorio(
	nome VARCHAR(50),
	descrizione TEXT NOT NULL,
	id_appartamento INTEGER,
	FOREIGN KEY (id_appartamento) 
		REFERENCES appartamento(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (nome, id_appartamento)
);

DROP TABLE IF EXISTS spesa;
CREATE TABLE spesa(
	nome VARCHAR(50),
	costo FLOAT(9,2) NOT NULL,
	id_appartamento INTEGER,
	FOREIGN KEY (id_appartamento) 
		REFERENCES appartamento(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (nome, id_appartamento)
);

DROP TABLE IF EXISTS aggiunge;
CREATE TABLE aggiunge(
	email_utente VARCHAR(100),
	id_appartamento INTEGER,
	FOREIGN KEY (id_appartamento) 
		REFERENCES appartamento(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (email_utente) 
		REFERENCES utente(email)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	PRIMARY KEY (email_utente, id_appartamento)
);

DROP TABLE IF EXISTS riserva;
CREATE TABLE riserva(
	id INTEGER auto_increment PRIMARY KEY,
	data_inizio DATE NOT NULL,
	data_fine DATE NOT NULL,
	email_utente VARCHAR(100),
	id_appartamento INTEGER,
	FOREIGN KEY (id_appartamento) 
		REFERENCES appartamento(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY (email_utente) 
		REFERENCES utente(email)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);