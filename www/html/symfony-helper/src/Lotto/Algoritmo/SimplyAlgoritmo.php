<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 25.08.18
 * Time: 22:59
 */

namespace App\Lotto\Algoritmo;

// todo get sequnces from Db dont live caculate
use App\Lotto\Algoritmo\ComplexAlgoritmo;

class SimplyAlgoritmo
{

    public $lotto_array;

    public $sequences_score;


    function __construct()
    {

    }

    function getSequenceByDate($date = null){
        return '33 55 56 46 56 33';
    }

    function getSequencesScore(){
        return $this->sequences_score;
    }

    // zählt die vorgekommen ziehungs zahlen von all den jahren
    // und rechnet sie zusammen
    // counter all the numbers of lotto years
    function _inData_count_all_numbers()
    {
        $repro = $this->getDoctrine();

        $array_key = null;
        $sum_conuter_array = null;

        // creat arrayy keys 1 to 49
        foreach (range(0, 49) as $number) {

            // $array_key[13] = 0;
            $array_key[$number] = 0;
        }


        foreach ($this->lotto_array as $key => $value) {

            $check = [
                    1 => $value['gezogene_zahl_1'],
                    2 => $value['gezogene_zahl_2'],
                    3 => $value['gezogene_zahl_3'],
                    4 => $value['gezogene_zahl_4'],
                    5 => $value['gezogene_zahl_5'],
                    6 => $value['gezogene_zahl_6'],
            ];

            //$lotto enthält alle reihen mit lottozahlen [0] 5,8,23,34,43,49
            for ($i = 1; $i <= 49; $i++) {


                if (is_array($check) && in_array($i, $check)) {

                    $sum = ($array_key[$i] + 1);

                    $array_key[$i] = $sum;

                    //echo '   ' .$i . print_r($value['sort']) .'   <br>';

                }

            }

            $sum_conuter_array = $array_key;
        }

        return $sum_conuter_array;
    }

    // zähle das vorkommen der übergebenen zahl und gebe das ergebniss in summer zurück
    // ceck the given number exist in lotto history
    function inData_given_number_array($check_num = [])
    {
        $array_key = null;
        $sum_conuter_array = null;

        if (is_array($check_num)) {
            // is in array (46,13,78) only three loops
            foreach ($check_num as $num) {
                if ($this->is_valid_lottonumber($num)) {

                    $array_key[$num] = null;

                    foreach ($this->lotto_array as $value) {

                        $check = [
                                1 => $value['gezogene_zahl_1'],
                                2 => $value['gezogene_zahl_2'],
                                3 => $value['gezogene_zahl_3'],
                                4 => $value['gezogene_zahl_4'],
                                5 => $value['gezogene_zahl_5'],
                                6 => $value['gezogene_zahl_6'],
                        ];


                        if (is_array($check) && in_array($num, $check)) {

                            $sum = ($array_key[$num] + 1);

                            $array_key[$num] = $sum;

                        }


                    }
                }
            }


            $sum_conuter_array = $array_key;
        }

        return $sum_conuter_array;
    }

    // prüft ob der übergebene nummern string schon gezogen wurde
    // todo umstellung der zahlen und variationnen hinzufügen
    function _inData_numbergroup_exist($num_string = '')
    {

        foreach ($this->lotto_array as $value) {

            if ($value['gezogene_zahl_1bis6'] == $num_string) {
                return $num_string;
            }

        }

        return false;
    }

    function test()
    {
        $string = null;

        foreach ($this->lotto_array as $value) {
            if ($value['jahr'] == 2007) {
                $string .= $value['gezogene_zahl_1'].
                        $value['gezogene_zahl_2'].
                        $value['gezogene_zahl_3'].
                        $value['gezogene_zahl_4'].
                        $value['gezogene_zahl_5'].
                        $value['gezogene_zahl_6'];
            }
        }

        $string = strlen($string);

        return $string;
    }

    function array_set_pointer_to_key(&$array, $key)
    {
        reset($array);
        $c = 0;
        $l = count($array);
        while (key($array) !== $key) { // jeden Key überprüfen
            if (++$c >= $l) {
                return false;
            } // Array-Ende erreicht
            next($array); // Pointer um 1 verschieben
        }

        return true; // Key gefunden
    }

    // die beste erste zahl für die erste ziehung im Jahr ist die zahl die in den
    // vorigen jahren noch !!!nicht in der ersten ziehung gezogen wurde
    // es hat auch schon die selbe nummer gegeben aber warum 2018 die 3

    function _fiirst_year_best(){
        $check_array = null;
        $numbers = null;

        foreach ($this->lotto_array as $value){
            if($value['ziehungs_nummer'] == 1){
                $check_array[$value['gezogene_zahl_1']] = 1;
            }
        }

        for($i =1; $i <=49; $i++){
            if(!array_key_exists($i,$check_array)){
                $numbers[] = $i;
            }
        }

        return $numbers;
    }

    // suche nach einer lottozahl und welche am häufigsten danach kommt in einem variablen abstand
    function check_line_distance($lotto_int = 13, $y_distance = 0, $x_distance = 0, $line ='auto')
    {
        foreach ($this->lotto_array as $key => $value) {


            //verschiebe die suche feld nach rechts
            switch ($x_distance) {
                case '0':
                    $x_distance = 'gezogene_zahl_1';
                    break;
                case '1':
                    $x_distance = 'gezogene_zahl_2';
                    break;
                case '2':
                    $x_distance = 'gezogene_zahl_3';
                    break;
                case '3':
                    $x_distance = 'gezogene_zahl_4';
                    break;
                case '4':
                    $x_distance = 'gezogene_zahl_5';
                    break;
                case '5':
                    $x_distance = 'gezogene_zahl_6';
                    break;
                case '6':
                    $x_distance = 'gezogene_zahl_6';
                    break;
            }



            if ($lotto_int == $value['gezogene_zahl_1']) {


                if ($y_distance == 0) {

                    $mark = $value['gezogene_zahl_2'];

                    return $mark;
                } else {
                    $nKey = $key + $y_distance;

                    $mark = $this->lotto_array[$nKey][$x_distance];

                    return $mark;
                }


            }


        }


    }

    // filter funktion

    // return true if the number a real lottto integer 0 to 49
    function is_valid_lottonumber($num)
    {
        if (is_integer($num)) {
            foreach (range(0, 49) as $number) {
                if ($num == $number) {
                    return true;
                }
            }
        } else {
            return false;
        }

        return false;
    }

    function sortNumbers($array, $sort_type = 'up')
    {

        if ($sort_type == 'up') {
            sort($array, SORT_NUMERIC);
        }

        return $array;
    }

}
