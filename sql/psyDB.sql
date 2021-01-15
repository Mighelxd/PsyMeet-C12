DROP database IF EXISTS psyDB;
CREATE database psyDB;

DROP USER IF EXISTS 'psyuser'@'localhost';
CREATE USER 'psyuser'@'localhost' IDENTIFIED BY 'psyuserR1!';
GRANT ALL ON psyDB.* TO 'psyuser'@'localhost';

USE psyDB;

DROP TABLE IF EXISTS professionista;
CREATE TABLE professionista(
 cf_prof CHAR(16) not null,
 nome VARCHAR(20) not null,
 cognome VARCHAR(20) not null,
 data_nascita DATE not null,
 email VARCHAR(50) not null unique,
 telefono VARCHAR(15) not null,
 cellulare VARCHAR(15) not null,
 passwor VARCHAR(50) not null,
 indirizzo_studio VARCHAR(500) not null,
 esperienze TEXT not null,
 pubblicazioni TEXT not null,
 titolo_studio VARCHAR(500) not null,
 n_iscrizione_albo VARCHAR(100) not null,
 partita_iva CHAR(11) not null,
 pec VARCHAR(50) not null,
 specializzazione VARCHAR(500) ,
 polizza_RC VARCHAR(500) not null,
 foto_profilo_professionista MEDIUMBLOB,
 PRIMARY KEY(cf_prof)
);

DROP TABLE IF EXISTS paziente;
CREATE TABLE paziente(
 cf CHAR(16) not null,
 nome VARCHAR(20) not null,
 cognome VARCHAR(20) not null,
 data_nascita DATE not null,
 email VARCHAR(50) not null unique,
 telefono VARCHAR(15) not null,
 passwor VARCHAR(50) not null,
 indirizzo VARCHAR(500) not null,
 istruzione VARCHAR(500) not null,
 lavoro VARCHAR(100) not null,
 difficol_cura INT not null,
 foto_profilo_paz MEDIUMBLOB,
 videochiamata boolean,
 PRIMARY KEY(cf)
);

DROP TABLE IF EXISTS terapia;
CREATE TABLE terapia(
 id_terapia INT unsigned auto_increment not null,
 data DATE not null,
 descrizione TEXT not null,
 cf_prof CHAR(16) not null,
 cf CHAR(16) not null,
 PRIMARY KEY(id_terapia),
 FOREIGN KEY(cf_prof) REFERENCES professionista(cf_prof)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(cf) REFERENCES paziente(cf)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS schedaPrimoColloquio;
CREATE TABLE schedaPrimoColloquio(
 id_scheda INT unsigned auto_increment not null,
 data DATE not null,
 problema TEXT not null,
 aspettative TEXT not null,
 motivazione TEXT not null,
 obiettivi TEXT not null,
 cambiamento TEXT not null,
 id_terapia INT unsigned not null,
 tipo TEXT not null,
 PRIMARY KEY(id_scheda),
 FOREIGN KEY(id_terapia) REFERENCES terapia(id_terapia)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS schedaAssessmentGeneralizzato;
CREATE TABLE schedaAssessmentGeneralizzato(
 id_scheda INT unsigned auto_increment not null,
 data DATE not null,
 autoreg_positivi TEXT not null,
 autoreg_negativi TEXT not null,
 cognitive_positivi TEXT not null,
 cognitive_negativi TEXT not null,
 self_management_positivi TEXT not null,
 self_management_negativi TEXT not null,
 sociali_positivi TEXT not null,
 sociali_negativi TEXT not null,
 id_terapia INT unsigned not null,
 tipo TEXT not null,
 PRIMARY KEY(id_scheda),
 FOREIGN KEY(id_terapia) REFERENCES terapia(id_terapia)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS schedaAssessmentFocalizzato;
CREATE TABLE schedaAssessmentFocalizzato(
 id_scheda INT unsigned auto_increment not null,
 data DATE not null,
 n_episodi INT not null,
 id_terapia INT unsigned not null,
 tipo TEXT not null,
 PRIMARY KEY(id_scheda),
 FOREIGN KEY(id_terapia) REFERENCES terapia(id_terapia)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS episodio;
CREATE TABLE episodio(
 id_episodio INT unsigned auto_increment not null,
 numero INT unsigned not null,
 analisi_fun TEXT not null,
 m_a TEXT not null,
 m_b TEXT not null,
 m_c TEXT not null,
 appunti TEXT not null,
 id_scheda INT unsigned not null,
 PRIMARY KEY(id_episodio),
 FOREIGN KEY(id_scheda) REFERENCES schedaAssessmentFocalizzato(id_scheda)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS schedaFollowup;
CREATE TABLE schedaFollowup(
 id_scheda INT unsigned auto_increment not null,
 data DATE not null,
 ricadute TEXT not null,
 esiti_positivi TEXT not null,
 id_terapia INT unsigned not null,
 tipo TEXT not null,
 PRIMARY KEY(id_scheda),
 FOREIGN KEY(id_terapia) REFERENCES terapia(id_terapia)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS schedaModelloEziologico;
CREATE TABLE schedaModelloEziologico(
 id_scheda INT unsigned auto_increment not null,
 data DATE not null,
 fattori_causativi TEXT not null,
 fattori_precipitanti TEXT not null,
 fattori_mantenimento TEXT not null,
 relazione_finale TEXT not null,
 id_terapia INT unsigned not null,
 tipo TEXT not null,
 PRIMARY KEY(id_scheda),
 FOREIGN KEY(id_terapia) REFERENCES terapia(id_terapia)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS appuntamento;
CREATE TABLE appuntamento(
 id_appuntamento INT unsigned auto_increment not null,
 data DATE not null,
 ora TIME not null,
 descrizione VARCHAR(500) not null,
 cf_prof CHAR(16) not null,
 cf CHAR(16) not null,
 PRIMARY KEY(id_appuntamento),
 FOREIGN KEY(cf_prof) REFERENCES professionista(cf_prof)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(cf) REFERENCES paziente(cf)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS pacchetto;
CREATE TABLE pacchetto(
 id_pacchetto INT unsigned auto_increment not null,
 n_sedute INT not null,
 prezzo FLOAT not null,
 tipologia VARCHAR(500) not null,
 PRIMARY KEY(id_pacchetto)
);

DROP TABLE IF EXISTS cartellaClinica;
CREATE TABLE cartellaClinica(
 id_cartella_clinica INT unsigned auto_increment not null,
 data_creazione date,
 q_umore INT not null,
 q_relazioni INT not null,
 patologie_pregresse TEXT not null,
 farmaci TEXT not null,
 cf_prof CHAR(16) not null,
 cf CHAR(16) not null,
 PRIMARY KEY(id_cartella_clinica),
 FOREIGN KEY(cf_prof) REFERENCES professionista(cf_prof)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(cf) REFERENCES paziente(cf)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS compito;
CREATE TABLE compito(
 id_compito INT unsigned auto_increment not null,
 data DATE not null,
 effettuato BOOL not null,
 titolo VARCHAR(1000) not null,
 descrizione TEXT not null,
 svolgimento VARCHAR (1000),
 correzione VARCHAR (500),
 cf_prof CHAR(16) not null,
 cf CHAR(16) not null,
 PRIMARY KEY(id_compito),
 FOREIGN KEY(cf_prof) REFERENCES professionista(cf_prof)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(cf) REFERENCES paziente(cf)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS fattura;
CREATE TABLE fattura(
 id_fattura INT unsigned auto_increment not null,
 data DATE not null,
 cf CHAR(16) not null,
 id_pacchetto INT unsigned not null,
 PRIMARY KEY(id_fattura),
 FOREIGN KEY(cf) REFERENCES paziente(cf)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(id_pacchetto) REFERENCES pacchetto(id_pacchetto)
 ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS scelta;
CREATE TABLE scelta(
 id_scelta INT unsigned auto_increment not null,
 cf_prof CHAR(16) not null,
 id_pacchetto INT unsigned not null,
 PRIMARY KEY(id_scelta),
 FOREIGN KEY(cf_prof) REFERENCES professionista(cf_prof)
 ON DELETE CASCADE ON UPDATE CASCADE,
 FOREIGN KEY(id_pacchetto) REFERENCES pacchetto(id_pacchetto)
 ON DELETE CASCADE ON UPDATE CASCADE
);
