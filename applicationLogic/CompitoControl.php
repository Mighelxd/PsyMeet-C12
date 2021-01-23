<?php
declare(strict_types=1);

/*
	* CompitoControl
	* Questo control fornisce tutte le operazioni che si possono fare per il compito'
	* Autore: Mary Cerullo
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/


/**
 *
 */
//define('TABLE_NAME', 'compito');


/**
 * Class CompitoControl
 *
 * @method string selcetAllCompitiProf(string $cfProf)
 */
class CompitoControl
{
    /**
     * @param $cfProf
     * @return array
     */
    public static function selectAllCompitiProf($cfProf)
	{
	    try{
           // if(isset($_SESSION['eccComp']) && $_SESSION['eccComp']!=""){$_SESSION['eccComp']="";}
            $arrKey = ['cf_prof'=>$cfProf];
            $arr = null;
            $allCompProf = DatabaseInterface::selectQueryByAtt($arrKey, 'compito');
            while ($row=$allCompProf->fetch_array()) {
                $comp= new Compito($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
                $arr[]=$comp;
            }

            return $arr;
        }catch (Exception $e){
	        $_SESSION['eccComp'] = $e->getMessage();
	        return null;
        }
	}


	// metodo aggiunto per selezionare tutti i compiti relativi al paziente

    /**
     * @param $cfPaz
     * @return array
     */
    public static function selectAllCompitiPaz($cfPaz)
	{
	    try{
          //  if(isset($_SESSION['eccComp']) && $_SESSION['eccComp']!=""){$_SESSION['eccComp']="";}
            $arrKey = ['cf'=>$cfPaz];
            $arr=null;
            $allCompPaz = DatabaseInterface::selectQueryByAtt($arrKey, 'compito');
            while ($row=$allCompPaz->fetch_array()) {
                $comp= new Compito($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
                $arr[]=$comp;
            }

            return $arr;
        }catch (Exception $e){
            $_SESSION['eccComp'] = $e->getMessage();
            return null;
        }
	}
}
