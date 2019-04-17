<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 30.09.18
 * Time: 20:17
 */

namespace App\Lotto\Calendar;

class Calendar
{
    private $today;
    private $year;
    private $relationship;


    function __construct()
    {
        $this->today = time();// unix tody
        $this->year = date('Y', $this->today);

        $this->calcRelationship();

    }

// calculate the next day of $relationship
// berechne den nächsten ziehungstage
    private function calcRelationship()
    {
        // todo lacal german lang on linux
        setlocale(LC_ALL, 'de_DE');


        $oneDay = 3600 * 24;
        $new_day = $this->today;
        $data = null;

        do {

            $week_day = date('w', $new_day);

            if ($week_day == 3 or $week_day == 6) {

                $data[] = strftime('%a %d.%m.%y', $new_day);
            }

            $new_day = $new_day + $oneDay;

            $c_year = date('Y', $new_day);

        } while ($this->year == $c_year);

        $this->relationship = $data;
    }

    public function getRelationship()
    {
        return $this->relationship;
    }

}
