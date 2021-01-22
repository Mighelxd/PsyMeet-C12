<?php
    class Professionista{
        private $cfProf;
        private $nome;
        private $cognome;
        private $dataNascita;
        private $email;
        private $telefono;
        private $cellulare;
        private $password;
        private $indirizzoStudio;
        private $esperienze;
        private $pubblicazioni;
        private $titoloStudio;
        private $nIscrizioneAlbo;
        private $partitaIva;
        private $pec;
        private $specializzazione;
        private $polizzaRc;
        private $immagineProfessionista;

        public static $tableName="professionista";

        public function __construct($cf,$n,$c,$date,$e,$tel,$cell,$pass,$indiSt,$esp,$pub,$titSt,$nIsc,$pIva,$p,$spec,$polRc,$img){
            if($cf == null || $n == null || $c == null || $date == null || $e == null || $tel == null
            || $cell == null || $pass == null || $indiSt == null || $esp == null || $pub == null || $titSt == null
            || $nIsc == null || $pIva == null || $p == null || $polRc == null){
                throw new Exception("Alcuni valori non definiti!");
            }
            else if(strlen($n)<2 || strlen($n)>50)
            {
                throw new Exception("Nome non rispetta la lunghezza prevista");
            }
            else if(!preg_match('/^[A-Za-z]+$/', $n))
            {
                throw new Exception("Nome non rispetta il formato previsto");
            }
            else if(strlen($c)<2 || strlen($c)>50)
            {
                throw new Exception("Cognome non rispetta la lunghezza prevista");
            }
            else if(!preg_match('/^[A-Za-z]+$/', $c))
            {
                throw new Exception("Cognome non rispetta il formato previsto");
            }
            else if($date[2] != "/" || $date[5]!="/")
            {
                throw new Exception("Data di nascita non rispetta il formato previsto");
            }
            else if($date<"12/12/1930" || $date>"12/12/1998")
            {
                throw new Exception("Il campo data di nascita non valido");
            }
            else if(strlen($cf)!=16){
                throw new Exception("Codice fiscale non valido!");
            }
            else if(!preg_match('/^[A-Z]{6}\d{2}[A-Z]\d{3}[A-Z]$/', $cf))
            {
                throw new Exception("Codice Fiscale non rispetta il formato previsto");
            }
            else if(strlen($tel)!=10){
                throw new Exception("Telefono non rispetta la lunghezza prevista");
            }
            else if(!preg_match("/^[0-9]{10}+$/", $tel)){
                throw new Exception("Telefono non rispetta il formato previsto");
            }
            else if(strlen($cell)!=10){
                throw new Exception("Cellulare non rispetta la lunghezza prevista");
            }
            else if(!preg_match("/^[0-9]{10}+$/", $cell)){
                throw new Exception("Cellulare non rispetta il formato previsto");
            }
            else if(strlen($pIva)!=11){
                throw new Exception("Partita Iva non rispetta la lunghezza prevista!");
            }
            else if(!preg_match("/^[0-9]{11}+$/", $pIva)){
                throw new Exception("Partita iva non rispetta il formatoprevisto");
            }
            else if(!preg_match("/^[A-Za-z0-9\s,àòèéùì]+$/",$indiSt)){
                throw new Exception("Formato di Indirizzo studio errato");
            }
            else if(strlen($e)<2 || strlen($e)>250){
                throw new Exception("Email non rispetta la lunghezza prevista");
            }
           else if(!preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/',$e)){
                throw new Exception("Email non rispetta il formato previsto");
            }
      /*    else if(strlen($pass)<8){
                throw new Exception("Lunghezza Password inferiore di quella prevista");
            }
            else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/", $pass)){
                throw new Exception("Formato di Password errato");
            }*/
          else if(!preg_match('/^[a-f0-9]{32}$/i', $pass)){
              throw new Exception("Formato di Password errato");
          }
          else if(strlen($titSt) < 2 || strlen($titSt)>500){
              throw new Exception("Titolo di studio non rispetta la lunghezza prevista");
          }
          else if(strlen($pub) <2 || strlen($pub)>500) {
              throw new Exception("Pubblicazioni scientifiche/partecipazioni non rispetta la lunghezza prevista");
          }
          else if(strlen($esp) <2 || strlen($esp)>500){
              throw new Exception("Esperienze professionali non rispetta la lunghezza prevista");
          }
          else if(strlen($nIsc)<2 || strlen($nIsc)>20){
              throw new Exception("Numero iscrizione albo non rispetta la lunghezza prevista");
          }
          else if(!preg_match('/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/', $nIsc)){
              throw new Exception("Numero iscrizione albo non rispetta il formato previsto");
          }
          else if(!preg_match("/^[A-Za-z0-9\s]+$/",$polRc)){
              throw new Exception("Polizza RC non rispetta il formato previsto");
          }


            $this->cfProf=$cf;
            $this->nome=$n;
            $this->cognome=$c;
            $this->dataNascita=$date;
            $this->email=$e;
            $this->telefono=$tel;
            $this->cellulare=$cell;
            $this->password=$pass;
            $this->indirizzoStudio=$indiSt;
            $this->esperienze=$esp;
            $this->pubblicazioni=$pub;
            $this->titoloStudio=$titSt;
            $this->nIscrizioneAlbo=$nIsc;
            $this->partitaIva=$pIva;
            $this->pec=$p;
            $this->specializzazione=$spec;
            $this->polizzaRc=$polRc;
            $this->immagineProfessionista=$img;
        }
        public function setCfProf($cf){
            if($cf == null ){
                throw new Exception("Nuovo codice fiscale non valido!");
            }
            else if(strlen($cf)!=16){
                throw new Exception("Nuovo codice fiscale non valido!");
            }
            $this->cfProf=$cf;
        }

        public function setNome($n){
            if($n==null){
                throw new Exception("Nuovo nome non valido!");
            }
            $this->nome=$n;
        }

        public function setCognome($c){
            if($c==null){
                throw new Exception("Nuovo cognome non valido!");
            }
            $this->cognome=$c;
        }

        public function setDataNascita($d){
            if($d == null){
                throw new Exception("Nuova data nascita non valida!");
            }
            $this->dataNascita=$d;
        }

        public function setEsperienze($esp){
            if($esp == null){
                throw new Exception("Nuovo campo esperienze non valido!");
            }
            else if(strlen($esp) <2 || strlen($esp)>500){
                throw new Exception("Esperienze professionali non rispetta la lunghezza prevista");
            }
            $this->esperienze=$esp;
        }

        public function setTelefono($tel){
            if($tel == null){
                throw new Exception("Nuovo numero telefono non valido!");
            }
            else if(strlen($tel)!=10){
                throw new Exception("Telefono non rispetta la lunghezza prevista");
            }
            else if(!preg_match("/^[0-9]{10}+$/", $tel)){
                throw new Exception("Telefono non rispetta il formato previsto");
            }
            $this->telefono=$tel;
        }

        public function setCellulare($cell){
            if($cell == null){
                throw new Exception("Nuovo numero cellulare non valido!");
            }
            else if(strlen($cell)!=10){
                throw new Exception("Cellulare non rispetta la lunghezza prevista");
            }
            else if(!preg_match("/^[0-9]{10}+$/", $cell)){
                throw new Exception("Cellulare non rispetta il formato previsto");
            }
            $this->cellulare=$cell;
        }

        public function setPassword($pass){
            if($pass == null){
                throw new Exception("Lunghezza nuova password non valida!");
            }
            $this->password=$pass;
        }

        public function setIndirizzoStudio($indiSt){
            if($indiSt == null){
                throw new Exception("Nuovo indirizzo studio non valido!");
            }
            $this->indirizzoStudio=$indiSt;
        }

        public function setEmail($e){
            if($e == null){
                throw new Exception("Nuova email non valida!");
            }
            $this->email=$e;
        }

        public function setPubblicazione($pub){
            if($pub == null){
                throw new Exception("Nuovo campo pubblicazione non valido!");
            }
            else if(strlen($pub) <2 || strlen($pub)>500) {
                throw new Exception("Pubblicazioni scientifiche/partecipazioni non rispetta la lunghezza prevista");
            }
            $this->pubblicazione=$pub;
        }

        public function setTitoloStudio($titSt){
            if($titSt == null){
                throw new Exception("Nuovo campo titolo studio non valido!");
            }
            else if(strlen($titSt) < 2 || strlen($titSt)>500){
                throw new Exception("Titolo di studio non rispetta la lunghezza prevista");
            }
            $this->titoloStudio=$titSt;
        }

        public function setNIscrizioneAlbo($nIsc){
            if($nIsc == null){
                throw new Exception("Nuovo campo numero iscrizione album non valido!");
            }
            $this->nIscrizioneAlbo=$nIsc;
        }

        public function setPartitaIva($pIva){
            if($pIva == null || strlen($pIva)!=11){
                throw new Exception("Nuova partita iva non valida!");
            }
            $this->partitaIva=$pIva;
        }

        public function setPec($p){
            if($p == null){
                throw new Exception("Nuova pec non valida!");
            }
            $this->pec=$p;
        }

        public function setSpecializzazione($spec){
            $this->spec;
        }

        public function setPolizzaRc($polRc){
            if($polRc == null){
                throw new Exception("Nuovo campo polizza RC non valido!");
            }
            $this->polizzaRc=$polRc;
        }

        public function setImmagineProfessionista($img){
            $this->immagineProfessionista;
        }

        public function getCfProf(){
            return $this->cfProf;
        }
        public function getNome(){
            return $this->nome;
        }

        public function getCognome(){
            return $this->cognome;
        }

        public function getDataNascita(){
            return $this->dataNascita;
        }

        public function getEsperienze(){
            return $this->esperienze;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function getCellulare(){
            return $this->cellulare;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getIndirizzoStudio(){
            return $this->indirizzoStudio;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPubblicazioni(){
            return $this->pubblicazioni;
        }

        public function getTitoloStudio(){
            return $this->titoloStudio;
        }

        public function getNIscrizioneAlbo(){
            return $this->nIscrizioneAlbo;
        }

        public function getPartitaIva(){
            return $this->partitaIva;
        }

        public function getPec(){
            return $this->pec;
        }

        public function getSpecializzazione(){
            return $this->specializzazione;
        }

        public function getPolizzaRc(){
            return $this->polizzaRc;
        }

        public function getImmagineProfessionista(){
            return $this->immagineProfessionista;
        }


        public function getArray(){
            return array("cf_prof" => $this->cfProf, "nome" => $this->nome, "cognome" => $this->cognome, "data_nascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "cellulare" => $this->cellulare, "passwor"=> $this->password, "indirizzo_studio"=> $this->indirizzoStudio, "esperienze" => $this->esperienze, "pubblicazioni" => $this->pubblicazioni, "titolo_studio" => $this->titoloStudio, "n_iscrizione_albo" => $this->nIscrizioneAlbo, "partita_iva" => $this->partitaIva, "pec" => $this->pec, "specializzazione" => $this->specializzazione, "polizza_rc" => $this->polizzaRc, "foto_profilo_professionista" => $this->immagineProfessionista);
        }
        public function getArrayNoVideo(){
            return array("cf_prof" => $this->cfProf, "nome" => $this->nome, "cognome" => $this->cognome, "data_nascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "cellulare" => $this->cellulare, "passwor"=> $this->password, "indirizzo_studio"=> $this->indirizzoStudio, "esperienze" => $this->esperienze, "pubblicazioni" => $this->pubblicazioni, "titolo_studio" => $this->titoloStudio, "n_iscrizione_albo" => $this->nIscrizioneAlbo, "partita_iva" => $this->partitaIva, "pec" => $this->pec, "specializzazione" => $this->specializzazione, "polizza_rc" => $this->polizzaRc);
        }
    }
?>
