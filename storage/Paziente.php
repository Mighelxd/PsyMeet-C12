
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
    public static $tableName="paziente";

    public function __construct($cf, $nome, $cognome, $dataNascita, $email, $telefono, $password, $indirizzo, $istruzione, $lavoro, $difficolCura, $fotoProfiloPaz)
    {
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
        $this->$fotoProfiloPaz = $fotoProfiloPaz;
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
        return $this->$fotoProfiloPaz;
    }

    public function setCf($cf)
    {
        $this->cf = $cf;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function setDataNascita($dataNascita)
    {
        $this->dataNascita = $dataNascita;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    public function setIstruzione($istruzione)
    {
        $this->istruzione = $istruzione;
    }

    public function setLavoro($lavoro)
    {
        $this->lavoro = $lavoro;
    }

    public function setDifficolCura($difficolCura)
    {
        $this->difficolCura = $difficolCura;
    }

    public function setFotoProfiloPaz($fotoProfiloPaz)
    {
         $this->$fotoProfiloPaz = $fotoProfiloPaz;
    }

    public function getArray()
    {
      return array("cf" => $this->cf, "nome" => $this->nome, "cognome" => $this->cognome, "data_nascita" => $this->dataNascita, "email" => $this->email, "telefono" => $this->telefono, "passwor" => $this->password, "indirizzo" => $this->indirizzo, "istruzione" => $this->istruzione,"lavoro" => $this->lavoro, "difficol_cura" => $this->difficolCura);
    }
}
