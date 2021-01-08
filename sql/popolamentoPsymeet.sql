/*SET GLOBAL local_infile = true;*/
use psyDB;
SHOW GLOBAL VARIABLES LIKE 'local_infile';

insert into professionista(nome,cognome,data_nascita,cf_prof,email,telefono,cellulare,passwor,indirizzo_studio,esperienze,pubblicazioni,titolo_studio,n_iscrizione_albo,partita_iva,pec,specializzazione,polizza_RC) value('Marco','Rossi','1980-10-12','RSSMRC80R12H703U','marcorossi@gmail.it','089456982','3202678943','0B39872D6291C4DB3ACFC886A4EBF2F6','via studio, 12','Trattamenti a scopo preventivo e curativo della salute mentale e del benessere psicologico di singoli soggetti, coppie, famiglie e organizzazioni sociali. Attività di consulenza psicologica (counseling), per la definizione di problemi e la risoluzione di difficoltà relative a processi evolutivi o involutivi, a fasi di transizione e stati di crisi, rinforzando la capacità di scelta, di problem solving e di cambiamento.','NA.','Laurea Scienze e Tecniche Psicologiche - Università Degli Studi di Napoli','A120','RSSMRC80R12','marcorossi@pec.it','psicologia cognitiva','Assicurazione psicologo');

insert into paziente(nome,cognome,data_nascita,cf,email,telefono,passwor,indirizzo,istruzione,lavoro,difficol_cura) value('Francesco','Nesta','1994-08-23','NSTFNC94M23H703G','franconesta@gmail.it','089255788','66744B081EBFE95452B96BE2CA6554ED','via casa, 10','Diploma','Impiegato','3');

insert into terapia(data,descrizione,cf_prof,cf) value('2020-10-02','cognitivo comportamentale','RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into schedaPrimoColloquio(data,problema,aspettative,motivazione,obiettivi,cambiamento,id_terapia,tipo) value('2020-10-02','Disturbo comportamentale','Il paziente vuole superare la paura del buio','NA.','Aiutare il paziente a superare il suo disturbo','NA.','1','Scheda Primo Colloquio');

insert into schedaAssessmentGeneralizzato(data,autoreg_positivi,autoreg_negativi,cognitive_positivi,cognitive_negativi,self_management_positivi,self_management_negativi,sociali_positivi,sociali_negativi,id_terapia,tipo) value('2020-10-02','NA','NA','NA','NA','NA','NA','NA','NA','1','Scheda Assessment Generalizzato');

insert into schedaAssessmentFocalizzato(data,analisi_fun,m_a,m_b,m_c,appunti,n_episodi,id_terapia,tipo) value('2020-10-02','NA','NA','NA','NA','NA','1','1','Scheda Assessment Focalizzato');

insert into schedaFollowup(data,ricadute,esiti_positivi,id_terapia,tipo) value('2020-12-10','NA','NA','1','Scheda Follow Up');

insert into schedaModelloEziologico(data,fattori_causativi,fattori_precipitanti,fattori_mantenimento,relazione_finale,id_terapia,tipo) value('2020-12-10','NA','NA','NA','NA','1','Scheda Modello Eziologico');

insert into appuntamento(data,ora,descrizione,cf_prof,cf) value('2020-10-01','19:00:00','Seduta primo colloquio','RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into pacchetto(n_sedute,prezzo,tipologia) value('1','60.00','Seduta singola');

insert into cartellaClinica(q_umore,q_relazioni,patologie_pregresse,farmaci,cf_prof,cf) value('3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into compito(data,effettuato,titolo,descrizione,svolgimento,correzione,cf_prof,cf) value('2020-10-21','1','Buio','NA', 'svolgimento1', 'correzione1', 'RSSMRC80R12H703U','NSTFNC94M23H703G');

insert into fattura(data,cf,id_pacchetto) value('2020-10-01','NSTFNC94M23H703G','1');

insert into scelta(cf_prof,id_pacchetto) value('RSSMRC80R12H703U','1');

/*load data local infile'/home/marco/Scrivania/datiPsymeet/datiProf.sql'
into table professionista(nome,cognome,data_nascita,cf_prof,email,telefono,cellulare,passwor,indirizzo_studio,esperienze,pubblicazioni,titolo_studio,n_iscrizione_albo,partita_iva,pec,specializzazione,polizza_RC);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiPaz.sql'
into table paziente(nome,cognome,data_nascita,cf,email,telefono,passwor,indirizzo,istruzione,lavoro,difficol_cura);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiTerapia.sql'
into table terapia(id_terapia,data,descrizione,cf_prof,cf);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiSPC.sql'
into table schedaPrimoColloquio(id_scheda,data,problema,aspettative,motivazione,obiettivi,cambiamento,id_terapia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiSAG.sql'
into table schedaAssessmentGeneralizzato(id_scheda,data,autoreg_positivi,autoreg_negativi,cognitive_positivi,cognitive_negativi,self_management_positivi,self_management_negativi,sociali_positivi,sociali_negativi,id_terapia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiSAF.sql'
into table schedaAssessmentFocalizzato(id_scheda,data,analisi_fun,m_a,m_b,m_c,appunti,n_episodi,id_terapia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiSFU.sql'
into table schedaFollowup(id_scheda,data,ricadute,esiti_positivi,id_terapia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiME.sql'
into table schedaModelloEziologico(id_scheda,data,fattori_causativi,fattori_precipitanti,fattori_mantenimento,relazione_finale,id_terapia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiAppun.sql'
into table appuntamento(id_appuntamento,data,ora,cf_prof,cf);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiPacc.sql'
into table pacchetto(id_pacchetto,n_sedute,prezzo,tipologia);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiCC.sql'
into table cartellaClinica(id_cartella_clinica,q_umore,q_relazioni,patologie_pregresse,farmaci,cf_prof,cf);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiCompito.sql'
into table compito(id_compito,data,effettuato,titolo,descrizione,cf_prof,cf);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiFattura.sql'
into table fattura(id_fattura,data,cf,id_pacchetto);

load data local infile '/home/marco/Scrivania/datiPsymeet/datiScelta.sql'
into table scelta(id_scelta,cf_prof,id_pacchetto);*/
