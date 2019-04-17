<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 13.10.18
 * Time: 19:56
 */

namespace App\Lotto\Algoritmo;

/*use App\Lotto\DataQuery;*/

class SimplyCheckNumbers
{
	// check last number combination occured
	// prüft ob eine Zahlenkombination schon gezogen wurde
	// todo verbesserung der Daten lagen whitespace in db string
	// todo vorbereitung vom nummern string in vergleich string
	// return only Bollen true,false
	function numberSequenceExist($number)
	{	global $lotto_table;


		foreach ($lotto_table as $value) {
			if ($value['gezogene_zahl_1bis6'] == $number) {

				return true;
			}
		}

		return false;
	}

	// ceck last number time occured
	// prüf wann ein teil einer Zahl das Letzte mal gezogen wurde
	function numberLastTimeOccurred($number){

	}

}
