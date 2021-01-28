<?php
declare(strict_types=1);

/*
	* FunArray
	* Questa classe fornisce tutti i metodi statici per gli array
	* Autore: Marco Campione
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/
class FunArray
{
	public static function arrayKeyFirst($arr)
	{
		$key=null;
		foreach ($arr as $x=>$x_value) {
			$key = $x;
			break;
		}
		return $key;
	}
}
