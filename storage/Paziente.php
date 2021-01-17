
<?php
/*
 * Gestione Paziente
 * Questa classe contiene le informazioni relative all'oggetto Paziente
 * Autore: Giuseppe Ferrante
 * Versione: 0.2
 * 2020 Copyright by PsyMeet - University of Salerno
*/

class Paziente
{
    private $nome;
    private $cognome;
    private $dataNascita;
    private $cf;
    private $email;
    private $telefono;
    private $password;
    private $indirizzo;
    private $istruzione;
    private $lavoro;
    private $difficolCura;
    private $fotoProfiloPaz;
    private $videochiamata;
    public static $tableName="paziente";

    public function __construct($cf, $nome, $cognome, $dataNascita, $email, $telefono, $password, $indirizzo, $istruzione, $lavoro, $difficolCura, $fotoProfiloPaz, $video)
    {
        if($cf == null || $nome == null || $cognome == null || $dataNascita == null || $email == null || $telefono == null
        || $password == null || $indirizzo == null || $istruzione == null || $lavoro == null || $difficolCura == null){
            throw new Exception("Alcuni valori non definiti!");
        }
        else if(strlen($cf)!=16){
            throw new Exception("Codice Fiscale non valido!");
        }
        else if(strlen($telefono)<10){
            throw new Exception("Numero non valido!");
        }
        else if(strlen(password)<8 || strlen(password)>25){
            throw new Exception("Password non valida!");
        }
        else if($difficolCura<1 || $difficolCura>5){
            throw new Exception("Difficol. cura non valida!");
        }
        $this->cf = $cf;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->password = $password;
        $this->indirizzo = $indirizzo;
        $this->istruzione = $istruzione;
        $this->lavoro = $lavoro;
        $this->difficolCura = $difficolCura;
        $this->fotoProfiloPaz = $fotoProfiloPaz;
        $this->videochiamata = $video;
    }

    public function getCf()
    {
        return $this->cf;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function getDataNascita()
    {
        return $this->dataNascita;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function getIstruzione()
    {
        return $this->istruzione;
    }

    public function getLavoro()
    {
        return $this->lavoro;
    }

    public function getDifficolCura()
    {
        return $this->difficolCura;
    }

    public function getFotoProfiloPaz()
    {
        return $this->fotoProfiloPaz;
    }
    public function getVideo(){
        return $this->videochiamata;
    }
    public function setCf($cf)
    {
        $this->cf = $cf;
    }

    public function setNome($nome)
    {
        if($nome == null){
            throw new Exception("Nuovo nome non valido!");
        }
        $this->nome = $nome;
    }

    public function setCognome($cognome)
    {
        if($cognome == null){
            throw new Exception("Nuovo cognome non valido!");
        }
        $this->cognome = $cognome;
    }

    public function setDataNascita($dataNascita)
    {
        if($dataNascita == null){
            throw new Exception("Nuovo data di nascita non valido!");
        }
        $this->dataNascita = $dataNascita;
    }

    public function setEmail($email)
    {
        if($email == null){
            throw new Exception("Nuova email non valida!");
        }
        $this->email = $email;
    }

    public function setTelefono($telefono)
    {
        if($telefono == null || strlen($telefono)<10){
            throw new Exception("Nuovo numero di telefono non valido!");
        }
        $this->telefono = $telefono;
    }

    public function setPassword($password)
    {
        if($password == null || strlen($password)<8 || strlen($password)>25){
            throw new Exception("Nuova password non valida!");
        }
        $this->password = $password;
    }

    public function setIndirizzo($indirizzo)
    {
        if($indirizzo == null){
            throw new Exception("Nuovo indirizzo non valido!");
        }
        $this->indirizzo = $indirizzo;
    }

    public function setIstruzione($istruzione)
    {
        if($istruzione == null){
            throw new Exception("Nuovo campo istruzione non valido!");
        }
        $this->istruzione = $istruzione;
    }

    public function setLavoro($lavoro)
    {
        if($lavoro == null){
            throw new Exception("Nuovo campo lavoro non valido!");
        }
        $this->lavoro = $lavoro;
    }

    public function setDifficolCura($difficolCura)
    {
        if($difficolCura == null || $difficolCura<1 || $difficolCura>5){
            throw new Exception("Nuovo valore difficolt. cura non valido!");
    }
        $this->difficolCura = $difficolCura;
    }

    public function setVideo($video){
        $this->videochiamata = $video;
    }
    public function setFotoProfiloPaz($fotoProfiloPaz)
    {
         $this->$fotoProfiloPaz = $fotoProfiloPaz;
    }

    public function getArray()
    {
      return array("cf" => $this->cf, "nome" => $this->nome, "cognome" => $this->cognome, "data_nascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "passwor" => $this->password, "indirizzo" => $this->indirizzo, "istruzione" => $this->istruzione,"lavoro" => $this->lavoro, "difficol_cura" => $this->difficolCura, "foto_profilo_paz" => $this->fotoProfiloPaz, "videochiamata" => $this->videochiamata);
    }

    public function getArrayNoFoto()
    {
      return array("cf" => $this->cf, "nome" => $this->nome, "cognome" => $this->cognome, "data_nascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "passwor" => $this->password, "indirizzo" => $this->indirizzo, "istruzione" => $this->istruzione,"lavoro" => $this->lavoro, "difficol_cura" => $this->difficolCura, "videochiamata" => $this->videochiamata);
    }
}
