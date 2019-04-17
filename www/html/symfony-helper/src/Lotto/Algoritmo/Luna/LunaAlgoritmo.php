<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 27.08.18
 * Time: 20:51
 */

namespace App\Lotto\Algoritmo\Luna;



class LunaAlgoritmo {
	function Var_o($k, $t){
		return 124.7746 - 1.5637558 * $k + .0020691 * $t * $t + .00000215 * $t * $t * $t;
	}

	function Var_f($k, $t){
		return 160.7108 + 390.67050274 * $k - .0016341 * $t * $t - .00000227 * $t * $t * $t + .000000011 * $t * $t * $t * $t;
	}

	function Var_m1($k, $t){
		return 201.5643 + 385.81693528 * $k + .1017438 * $t * $t + .00001239 * $t * $t * $t - .000000058 * $t * $t * $t * $t;
	}

	function Var_m($k, $t){
		return 2.5534 + 29.10535669 * $k - .0000218 * $t * $t - .00000011 * $t * $t * $t;
	}

	function Var_e($t){
		return 1 - .002516 * $t - .0000074 * $t * $t;
	}

	function Var_JDE($k, $t){
		return 2451550.09765 + 29.530588853 * $k + .0001337 * $t * $t - .00000015 * $t * $t * $t + .00000000073 * $t * $t * $t * $t;
	}

	function CS($x){
		return cos($x * .0174532925199433);
	}

	function SN($x){
		return sin($x * .0174532925199433);
	}

	function Neumond($k){
		$k = floor($k);
		$t = $k / 1236.85;
		$e = $this->Var_e($t);
		$m = $this->Var_m($k, $t);
		$m1 = $this->Var_m1($k, $t);
		$f = $this->Var_f($k, $t);
		$o = $this->Var_o($k, $t);
		//Neumondkorrekturen
		$JDE = $this->Var_JDE($k, $t);
		$JDE += (-1) * 0.4072 * $this->SN($m1) + 0.17241 * $e * $this->SN($m) + 0.01608 * $this->SN(2 * $m1) + 0.01039 * $this->SN(2 * $f) + 0.00739 * $e * $this->SN($m1 - $m) - 0.00514 * $e * $this->SN($m1 + $m) + 0.00208 * $e * $e * $this->SN(2 * $m) - 0.00111 * $this->SN($m1 - 2 * $f) - 0.00057 * $this->SN($m1 + 2 * $f);
		$JDE += 0.00056 * $e * $this->SN(2 * $m1 + $m) - 0.00042 * $this->SN(3 * $m1) + 0.00042 * $e * $this->SN($m + 2 * $f) + 0.00038 * $e * $this->SN($m - 2 * $f) - 0.00024 * $e * $this->SN(2 * $m1 - $m) - 0.00017 * $this->SN($o) - 0.00007 * $this->SN($m1 + 2 * $m) + 0.00004 * $this->SN(2 * $m1 - 2 * $f);
		$JDE += 0.00004 * $this->SN(3 * $m) + 0.00003 * $this->SN($m1 + $m - 2 * $f) + 0.00003 * $this->SN(2 * $m1 + 2 * $f) - 0.00003 * $this->SN($m1 + $m + 2 * $f) + 0.00003 * $this->SN($m1 - $m + 2 * $f) - 0.00002 * $this->SN($m1 - $m - 2 * $f) - 0.00002 * $this->SN(3 * $m1 + $m);
		$JDE += .00002 * $this->SN(4 * $m1);
		return $this->Korrektur($JDE, $t, $k);
	}

	function Viertel($k, $modus){
		// modus = .25 = Erstes Viertel, modus = .75 = Letztes Viertel
		$k = floor($k) + $modus;
		$t = $k / 1236.85;
		$e = $this->Var_e($t);
		$m = $this->Var_m($k, $t);
		$m1 = $this->Var_m1($k, $t);
		$f = $this->Var_f($k, $t);
		$o = $this->Var_o($k, $t);
		// Viertelmondkorrekturen
		$JDE = $this->Var_JDE($k, $t);
		$JDE += -.62801 * $this->SN($m1) + .17172 * $e * $this->SN($m) - .01183 * $e * $this->SN($m1 + $m) + .00862 * $this->SN(2 * $m1) + .00804 * $this->SN(2 * $f) + .00454 * $e * $this->SN($m1 - $m) + .00204 * $e * $e * $this->SN(2 * $m) - .0018 * $this->SN($m1 - 2 * $f) - .0007 * $this->SN($m1 + 2 * $f);
		$JDE += -.0004 * $this->SN(3 * $m1) - .00034 * $e * $this->SN(2 * $m1 - $m) + .00032 * $e * $this->SN($m + 2 * $f) + .00032 * $e * $this->SN($m - 2 * $f) - .00028 * $e * $e * $this->SN($m1 + 2 * $m) + .00027 * $e * $this->SN(2 * $m1 + $m) - .00017 * $this->SN($o);
		$JDE += -.00005 * $this->SN($m1 - $m - 2 * $f) + .00004 * $this->SN(2 * $m1 + 2 * $f) - .00004 * $this->SN($m1 + $m + 2 * $f) + .00004 * $this->SN($m1 - 2 * $m) + .00003 * $this->SN($m1 + $m - 2 * $f) + .00003 * $this->SN(3 * $m) + .00002 * $this->SN(2 * $m1 - 2 * $f);
		$JDE += .00002 * $this->SN($m1 - $m + 2 * $f) - .00002 * $this->SN(3 * $m1 + $m);
		$w = .00306 - .00038 * $e * $this->CS($m) + .00026 * $this->CS($m1) - .00002 * $this->CS($m1 - $m) + .00002 * $this->CS($m1 + $m) + .00002 * $this->CS(2 * $f);
		if ($modus == .25) {$JDE += $w;} else {$JDE += (-1)*$w;}
		return $this->Korrektur($JDE, $t, $k);
	}

	function Vollmond($k){
		$k = floor($k) + .5;
		$t = $k / 1236.85;
		$e = $this->Var_e($t);
		$m = $this->Var_m($k, $t);
		$m1 = $this->Var_m1($k, $t);
		$f = $this->Var_f($k, $t);
		$o = $this->Var_o($k, $t);
		//Vollmondkorrekturen
		$JDE = $this->Var_JDE($k, $t);
		$JDE += -.40614 * $this->SN($m1) + .17302 * $e * $this->SN($m) + .01614 * $this->SN(2 * $m1) + .01043 * $this->SN(2 * $f) + .00734 * $e * $this->SN($m1 - $m) - .00515 * $e * $this->SN($m1 + $m) + .00209 * $e * $e * $this->SN(2 * $m) - .00111 * $this->SN($m1 - 2 * $f) - .00057 * $this->SN($m1 + 2 * $f);
		$JDE += .00056 * $e * $this->SN(2 * $m1 + $m) - .00042 * $this->SN(3 * $m1) + .00042 * $e * $this->SN($m + 2 * $f) + .00038 * $e * $this->SN($m - 2 * $f) - .00024 * $e * $this->SN(2 * $m1 - $m) - .00017 * $this->SN($o) - .00007 * $this->SN($m1 + 2 * $m) + .00004 * $this->SN(2 * $m1 - 2 * $f);
		$JDE += .00004 * $this->SN(3 * $m) + .00003 * $this->SN($m1 + $m - 2 * $f) + .00003 * $this->SN(2 * $m1 + 2 * $f) - .00003 * $this->SN($m1 + $m + 2 * $f) + .00003 * $this->SN($m1 - $m + 2 * $f) - .00002 * $this->SN($m1 - $m - 2 * $f) - .00002 * $this->SN(3 * $m1 + $m);
		$JDE += .00002 * $this->SN(4 * $m1);
		return $this->Korrektur($JDE, $t, $k);
	}

	function Korrektur($JDE, $t, $k){
		//Zusätzlichen Korrekturen
		$JDE += .000325 * $this->SN(299.77 + .107408 * $k - .009173 * $t * $t) + .000165 * $this->SN(251.88 + .016321 * $k) + .000164 * $this->SN(251.83 + 26.651886 * $k) + .000126 * $this->SN(349.42 + 36.412478 * $k) + .00011 * $this->SN(84.66 + 18.206239 * $k);
		$JDE += .000062 * $this->SN(141.74 + 53.303771 * $k) + .00006 * $this->SN(207.14 + 2.453732 * $k) + .000056 * $this->SN(154.84 + 7.30686 * $k) + .000047 * $this->SN(34.52 + 27.261239 * $k) + .000042 * $this->SN(207.19 + .121824 * $k) + .00004 * $this->SN(291.34 + 1.844379 * $k);
		$JDE += .000037 * $this->SN(161.72 + 24.198154 * $k) + .000035 * $this->SN(239.56 + 25.513099 * $k) + .000023 * $this->SN(331.55 + 3.592518 * $k);
		return $JDE;
	}

	function Var_k($Jahr, $Aktdatum, $tz){
		return ($Jahr + ((date("m", time()) - 1) * 30.4 + date("d", time()) + $tz) / 365 - 2000) * 12.3685;
	}

	function NaechsterVM($Jahr, $Aktdatum, $zeit){
		$tz = 0;
		$k = "";
		while($this->Vollmond($k) < $zeit) {
			$k = $this->Var_k($Jahr, $Aktdatum, $tz);
			$tz += 1;
		}
		return $this->Vollmond($k) - $zeit;
	}

	function NaechstesLV($Jahr, $Aktdatum, $zeit){
		$tz = 0;
		$k = "";
		while($this->Viertel($k, .75) < $zeit) {
			$k = $this->Var_k($Jahr, $Aktdatum, $tz);
			$tz += 1;
		}
		return $this->Viertel($k, .75) - $zeit;
	}

	function NaechsterNM($Jahr, $Aktdatum, $zeit){
		$tz = 0;
		$k = "";
		while($this->Neumond($k) < $zeit) {
			$k = $this->Var_k($Jahr, $Aktdatum, $tz);
			$tz += 1;
		}
		return $this->Neumond($k) - $zeit;
	}

	function NaechstesEV($Jahr, $Aktdatum, $zeit){
		$tz = 0;
		$k = "";
		while($this->Viertel($k, .25) < $zeit) {
			$k = $this->Var_k($Jahr, $Aktdatum, $tz);
			$tz += 1;
		}
		return $this->Viertel($k, .25) - $zeit;
	}

	function nextMV($date = false){
		$temp = date_default_timezone_get();
		date_default_timezone_set("UTC");

		if($date != false)
			$aktuell = $date;
		else
			$aktuell = time();
		$zeit = $aktuell / 86400 + 2440587.5; // Umrechnen in Julianische Tage
		$Jahr = date("Y", $aktuell);

		$JDE_mondphase['vm'] = $this->NaechsterVM($Jahr, $aktuell, $zeit);
		$JDE_mondphase['lv'] = $this->NaechstesLV($Jahr, $aktuell, $zeit);
		$JDE_mondphase['nm'] = $this->NaechsterNM($Jahr, $aktuell, $zeit);
		$JDE_mondphase['ev'] = $this->NaechstesEV($Jahr, $aktuell, $zeit);

		asort($JDE_mondphase);

		$JDE_mondphase['vm'] = $aktuell + $JDE_mondphase['vm'] * 86400;
		$JDE_mondphase['lv'] = $aktuell + $JDE_mondphase['lv'] * 86400;
		$JDE_mondphase['nm'] = $aktuell + $JDE_mondphase['nm'] * 86400;
		$JDE_mondphase['ev'] = $aktuell + $JDE_mondphase['ev'] * 86400;

		date_default_timezone_set($temp);
		return $JDE_mondphase;
	}
}
