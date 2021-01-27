use psyDB;
SHOW GLOBAL VARIABLES LIKE 'local_infile';

insert into professionista(cf_prof,nome,cognome,data_nascita,email,telefono,cellulare,passwor,indirizzo_studio,esperienze,pubblicazioni,titolo_studio,n_iscrizione_albo,partita_iva,pec,specializzazione,polizza_RC) value('RSSMRC80R12H703U','Marco','Rossi','1980-12-12','marcorossi@gmail.it','0894569820','3202678943','0B39872D6291C4DB3ACFC886A4EBF2F6','via studio, 12','Trattamenti a scopo preventivo e curativo della salute mentale e del benessere psicologico di singoli soggetti, coppie, famiglie e organizzazioni sociali.','NA.','Laurea Scienze e Tecniche Psicologiche - Università Degli Studi di Napoli','A120','RSSMRC80R12','marcorossi@pec.it','psicologia cognitiva','Assicurazione psicologo');

insert into paziente(cf,nome,cognome,data_nascita,email,telefono,passwor,indirizzo,istruzione,lavoro,difficol_cura,videochiamata) value('NSTFNC94M23H703G','Francesco','Nesta','1994-08-23','franconesta@gmail.it','0892557880','66744B081EBFE95452B96BE2CA6554ED','via casa, 10','Diploma','Impiegato','3',false);

insert into terapia(data,descrizione,cf_prof,cf) value('2021-01-02','cognitivo comportamentale','RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into schedaAssessmentFocalizzato(data,n_episodi,id_terapia,tipo) value('2020-01-02','0','1','Scheda Assessment Focalizzato');

insert into appuntamento(data,ora,descrizione,cf_prof,cf) value('2021-10-01','19:00:00','Seduta primo colloquio','RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into pacchetto(n_sedute,prezzo,tipologia) value('1','60.00','1 seduta');

insert into pacchetto(n_sedute,prezzo,tipologia) value('6','320.00','6 sedute');

insert into pacchetto(n_sedute,prezzo,tipologia) value('10','500.00','10 sedute');

insert into pacchetto(n_sedute,prezzo,tipologia) value('20','800.00','20 sedute');

insert into pacchetto(n_sedute,prezzo,tipologia) value('0','50.00','Relazione finale');

insert into compito(data,effettuato,titolo,descrizione,svolgimento,correzione,cf_prof,cf) value('2020-01-21','1','Buio','NA', 'svolgimento1', 'correzione1', 'RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into scelta(cf_prof,id_pacchetto) value('RSSMRC80R12H703U','1');

insert into fattura(data,cf,id_scelta,n_sedute_rim) value('2021-01-10','NSTFNC94M23H703G','1','1');