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
        private $videoProfessionista;

        public function __construct($cf,$n,$c,$date,$e,$tel,$cell,$pass,$indiSt,$esp,$pub,$titSt,$nIsc,$pIva,$p,$spec,$polRc,$video,$img){
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
            $this->videoProfessionista=$video;
            $this->immagineProfessionista=$img;
        }

        public function setNome($n){
            $this->nome=$n;
        }

        public function setCognome($c){
            $this->cognome=$c;
        }

        public function setDataNascita($d){
            $this->dataNascita=$d;
        }

        public function setEsperienze($esp){
            $this->esperienze=$esp;
        }

        public function setTelefono($tel){
            $this->telefono=$tel;
        }

        public function setCellulare($cell){
            $this->cellulare=$cell;
        }

        public function setPassword($pass){
            $this->password=$pass;
        }

        public function setIndirizzoStudio($indiSt){
            $this->indirizzoStudio=$indiSt;
        }

        public function setEmail($e){
            $this->email=$e;
        }

        public function setPubblicazione($pub){
            $this->pubblicazione=$pub;
        }

        public function setTitoloStudio($titSt){
            $this->titoloStudio=$titSt;
        }

        public function setNIscrizioneAlbo($nIsc){
            $this->nIscrizioneAlbo=$nIsc;
        }

        public function setPartitaIva($pIva){
            $this->partitaIva=$pIva;
        }

        public function setPec($p){
            $this->pec=$p;
        }

        public function setSpecializzazione($spec){
            $this->spec;
        }

        public function setPolizzaRc($polRc){
            $this->polizzaRc=$polRc;
        }

        public function setVideoProfessionista($video){
            $this->videoProfessionista=$video;
        }

        public function setImmagineProfessionista($img){
            $this->immagineProfessionista;
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

        public function getPubblicazione(){
            return $this->pubblicazione;
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

        public function getVideoPresentazione(){
            return $this->videoPresentazione;
        }

        public function getImmagineProfessionista(){
            return $this->immagineProfessionista;
        }


        public function getArray(){
            return array("cfProf" => $this->cfProf, "nome" => $this->nome, "cognome" => $this->cognome, "dataNascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "cellulare" => $this->cellulare, "passwor"=> $this->password, "indirizzoStudio"=> $this->indirizzoStudio, "esperienze" => $this->esperienze, "pubblicazioni" => $this->pubblicazioni, "titoloStudio" => $this->titoloStudio, "nIscrizioneAlbo" => $this->nIscrizioneAlbo, "partitaIva" => $this->partitaIva, "pec" => $this->partitaIva, "specializzazione" => $this->specializzazione, "polizzaRc" => $this->$polizzaRc, "videoProfessionista" => $this->videoProfessionista, "foto_profilo_professionista" => $this->image);
        }
    }
?>