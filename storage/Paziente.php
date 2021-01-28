
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
	public static $tableName='paziente';
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


	public function __construct(
		$cf,
		$nome,
		$cognome,
		$dataNascita,
		$email,
		$telefono,
		$password,
		$indirizzo,
		$istruzione,
		$lavoro,
		$difficolCura,
		$fotoProfiloPaz,
		$video
	) {
		if ($cf == null || $nome == null || $dataNascita == null || $email == null || $telefono == null
		|| $password == null || $indirizzo == null || $istruzione == null || $lavoro == null) {
			throw new Exception('Alcuni valori non definiti!');
		} elseif (strlen($cf)!=16) {
			throw new Exception('Il campo codice fiscale non rispetta la lunghezza');
		} elseif (strlen($nome) == 0) {
			throw new Exception('Il campo nome è vuoto');
		} elseif (strlen($nome)<2 || strlen($nome)>50) {
			throw new Exception('Il campo campo nome non rispetta la lunghezza');
		} elseif (strlen($cognome)==0 || $cognome == null) {
			throw new Exception('Il campo cognome è vuoto');
		} elseif (!preg_match('/[A-Za-z]$/', $nome)) {
			throw new Exception('Il campo nome non rispetta il formato');
		} elseif (strlen($cognome)<2 || strlen($cognome)>50) {
			throw new Exception('Il campo campo cognome non rispetta la lunghezza');
		} elseif (!preg_match('/[A-Za-z]$/', $cognome)) {
			throw new Exception('Il campo cognome non rispetta il formato');
		} elseif ($dataNascita[4] != '-' || $dataNascita[7]!='-') {
			throw new Exception('Il campo data di nascita non rispetta il formato');
		} elseif ($dataNascita<'1930-12-12' || $dataNascita>'2005-12-12') {
			throw new Exception('Il campo data di nascita non rispetta il formato');
		} elseif (strlen($email)<3 || strlen($email)>50) {
			throw new Exception('Il campo email non rispetta la lunghezza');
		} elseif (!preg_match('/^\w+@[a-zA-Z_]+?.[a-zA-Z]{2,3}$/', $email)) {
			throw new Exception('Il campo email non rispetta il formato');
		} elseif (strlen($telefono)<10 || strlen($telefono)>10) {
			throw new Exception('Il campo telefono non rispetta la lunghezza');
		} elseif (!preg_match('/^[0-9]{10}+$/', $telefono)) {
			throw new Exception('Il campo telefono non rispetta il formato');
		} elseif (!preg_match('/^[A-Za-z0-9\s,àòèéùì]+$/', $indirizzo)) {
			throw new Exception('Il campo indirizzo non rispetta il formato');
		} elseif (strlen($istruzione) <2 || strlen($istruzione) >500) {
			throw new Exception('Il campo istruzione non rispetta la lunghezza');
		} elseif (strlen($lavoro) <2 || strlen($lavoro) >500) {
			throw new Exception('Il campo lavoro non rispetta la lunghezza');
		} elseif ($difficolCura == null) {
			throw new Exception('Il campo difficoltà cura è vuoto');
		} elseif ($difficolCura<1 || $difficolCura>5) {
			throw new Exception('Il campo difficoltà cura non rispetta il formato');
		} elseif (strlen($difficolCura) != 1) {
			throw new Exception('Il campo difficoltà cura non rispetta la lunghezza');
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


	public function getVideo()
	{
		return $this->videochiamata;
	}


	public function setCf($cf)
	{
		$this->cf = $cf;
	}


	public function setNome($nome)
	{
		if ($nome == null) {
			throw new Exception('Il campo nome non è definito');
		} elseif (strlen($nome) == 0) {
			throw new Exception('Il campo nome è vuoto');
		} elseif (strlen($nome)<2 || strlen($nome)>50) {
			throw new Exception('Il campo campo nome non rispetta la lunghezza');
		} elseif (!preg_match('/[A-Za-z]$/', $nome)) {
			throw new Exception('Il campo nome non rispetta il formato');
		}
		$this->nome = $nome;
	}


	public function setCognome($cognome)
	{
		if ($cognome == null) {
			throw new Exception('Il campo cognome non è definito');
		} elseif (strlen($cognome)==0) {
			throw new Exception('Il campo cognome è vuoto');
		} elseif (strlen($cognome)<2 || strlen($cognome)>50) {
			throw new Exception('Il campo campo cognome non rispetta la lunghezza');
		} elseif (!preg_match('/[A-Za-z]$/', $cognome)) {
			throw new Exception('Il campo cognome non rispetta il formato');
		}
		$this->cognome = $cognome;
	}


	public function setDataNascita($dataNascita)
	{
		if ($dataNascita == null) {
			throw new Exception('Il campo data di nascita non è definito');
		} elseif ($dataNascita[4] != '-' || $dataNascita[7]!='-') {
			throw new Exception('Il campo data di nascita non rispetta il formato');
		} elseif ($dataNascita<'1930-12-12' || $dataNascita>'2005-12-12') {
			throw new Exception('Il campo data di nascita non rispetta il formato');
		}
		$this->dataNascita = $dataNascita;
	}


	public function setEmail($email)
	{
		if ($email == null) {
			throw new Exception('Il campo email non è definito');
		} elseif (strlen($email)<3 || strlen($email)>50) {
			throw new Exception('Il campo email non rispetta la lunghezza');
		} elseif (!preg_match('/^\w+@[a-zA-Z_]+?.[a-zA-Z]{2,3}$/', $email)) {
			throw new Exception('Il campo email non rispetta il formato');
		}
		$this->email = $email;
	}


	public function setTelefono($telefono)
	{
		if ($telefono == null || strlen($telefono)<9) {
			throw new Exception('Il campo telefono non è definito');
		} elseif (strlen($telefono)<10 || strlen($telefono)>10) {
			throw new Exception('Il campo telefono non rispetta la lunghezza');
		} elseif (!preg_match('/^[0-9]{10}+$/', $telefono)) {
			throw new Exception('Il campo telefono non rispetta il formato');
		}
		$this->telefono = $telefono;
	}


	public function setPassword($password)
	{
		if ($password == null) {
			throw new Exception('Nuova password non valida!');
		}
		$this->password = $password;
	}


	public function setIndirizzo($indirizzo)
	{
		if ($indirizzo == null) {
			throw new Exception('Il campo indirizzo non è definito');
		} elseif (!preg_match('/^[A-Za-z0-9\s,àòèéùì]+$/', $indirizzo)) {
			throw new Exception('Il campo indirizzo non rispetta il formato');
		}
		$this->indirizzo = $indirizzo;
	}


	public function setIstruzione($istruzione)
	{
		if ($istruzione == null) {
			throw new Exception('Il campo istruzione non è definito');
		} elseif (strlen($istruzione) <2 || strlen($istruzione) >500) {
			throw new Exception('Il campo istruzione non rispetta la lunghezza');
		}
		$this->istruzione = $istruzione;
	}


	public function setLavoro($lavoro)
	{
		if ($lavoro == null) {
			throw new Exception('Il campo lavoro non è definito');
		} elseif (strlen($lavoro) <2 || strlen($lavoro) >500) {
			throw new Exception('Il campo lavoro non rispetta la lunghezza');
		}
		$this->lavoro = $lavoro;
	}


	public function setDifficolCura($difficolCura)
	{
		if ($difficolCura == null || $difficolCura<1 || $difficolCura>5) {
			throw new Exception('Il campo difficoltà cura non è definito');
		} elseif ($difficolCura<1 || $difficolCura>5) {
			throw new Exception('Il campo difficoltà cura non rispetta il formato');
		} elseif (strlen($difficolCura) != 1) {
			throw new Exception('Il campo difficoltà cura non rispetta la lunghezza');
		}
		$this->difficolCura = $difficolCura;
	}


	public function setVideo($video)
	{
		$this->videochiamata = $video;
	}


	public function setFotoProfiloPaz($fotoProfiloPaz)
	{
		$this->$fotoProfiloPaz = $fotoProfiloPaz;
	}


	public function getArray()
	{
		return ['cf' => $this->cf, 'nome' => $this->nome, 'cognome' => $this->cognome, 'data_nascita' => $this->dataNascita, 'email' => $this->email, 'telefono' => $this->telefono, 'passwor' => $this->password, 'indirizzo' => $this->indirizzo, 'istruzione' => $this->istruzione, 'lavoro' => $this->lavoro, 'difficol_cura' => $this->difficolCura, 'foto_profilo_paz' => $this->fotoProfiloPaz, 'videochiamata' => $this->videochiamata];
	}


	public function getArrayNoFoto()
	{
		return ['cf' => $this->cf, 'nome' => $this->nome, 'cognome' => $this->cognome, 'data_nascita' => $this->dataNascita, 'email' => $this->email, 'telefono' => $this->telefono, 'passwor' => $this->password, 'indirizzo' => $this->indirizzo, 'istruzione' => $this->istruzione, 'lavoro' => $this->lavoro, 'difficol_cura' => $this->difficolCura, 'videochiamata' => $this->videochiamata];
	}
}
