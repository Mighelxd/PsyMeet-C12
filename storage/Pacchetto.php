<?php


/**
 * Class Pacchetto
 */
class Pacchetto
{

	/** @var string */
	public static $tableName='pacchetto';

	/** @var */
	private $id_pacchetto;

	/** @var */
	private $n_sedute;

	/** @var */
	private $prezzo;

	/** @var */
	private $tipologia;


	/**
	 * Pacchetto constructor.
	 * @param $id_pack
	 * @param $n_sed
	 * @param $price
	 * @param $type
	 */
	public function __construct($id_pack, $n_sed, $price, $type)
	{
		if ($n_sed == null || $price == null || $type == null) {
			throw new Exception('Alcuni valori non definiti!');
		} elseif ($n_sed != 1 && $n_sed!=6 && $n_sed!=10 && $n_sed!=20 && $n_sed!=0) {
			throw new Exception('Numero sedute errate!');
		} elseif ($price != 50 && $price != 60 && $price!= 320 && $price!=500 && $price!=800) {
			throw new Exception('Prezzo errato!');
		}
		$this->id_pacchetto = $id_pack;
		$this->n_sedute = $n_sed;
		$this->prezzo= $price;
		$this->tipologia = $type;
	}


	/**
	 * @property-read string $id_pacchetto
	 * @method string getIdPacchetto()
	 * @return mixed
	 */
	public function getIdPacchetto()
	{
		return $this->id_pacchetto;
	}


	/**
	 * @return mixed
	 */
	public function getNSedute()
	{
		return $this->n_sedute;
	}


	/**
	 * @return mixed
	 */
	public function getPrezzo()
	{
		return $this->prezzo;
	}


	/**
	 * @return mixed
	 */
	public function getTipologia()
	{
		return $this->tipologia;
	}


	/**
	 * @return array
	 */
	public function getArray()
	{
		return ['id_pacchetto' => $this->id_pacchetto, 'n_sedute' => $this->n_sedute, 'prezzo' => $this->prezzo, 'tipologia' => $this->tipologia];
	}


	public function setNSedute($n_sedute)
	{
		if ($n_sedute == null || ($n_sedute != 1 && $n_sedute!=6 && $n_sedute!=10 && $n_sedute!=20 && $n_sedute!=0)) {
			throw new Exception('Nuovo numero sedute errato!');
		}
		$this->n_sedute = $n_sedute;
	}


	public function setPrezzo($price)
	{
		if ($price==null || ($price != 50 && $price != 60 && $price!= 320 && $price!=500 && $price!=800)) {
			throw new Exception('Nuovo prezzo non valido!');
		}
		$this->prezzo = $price;
	}


	public function setTipologia($tipologia)
	{
		if ($tipologia == null) {
			throw new Exception('Nuovo campo tipologia non valido!');
		}
		$this->tipologia = $tipologia;
	}
}
