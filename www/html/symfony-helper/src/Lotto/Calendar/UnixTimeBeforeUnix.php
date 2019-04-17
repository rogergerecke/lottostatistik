<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 28.12.18
 * Time: 14:41
 */

namespace App\Lotto\Calendar;


/**
 * Class UnixTimeBeforeUnix
 *
 * @package App\Lotto\Calendar
 */
class UnixTimeBeforeUnix
{
    /**
     * @var
     */
    private $start_time;
    /**
     * @var
     */
    private $end_time;
    /**
     * @var
     */
    private $time_diff;


    /**
     * @return \App\Lotto\Calendar\UnixTimeBeforeUnix
     */
    public function setTimeDiff(): self
    {
        $this->time_diff = $this->getTimeDiff();

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeDiff(): int
    {
        $this->time_diff = strtotime($this->end_time, $this->start_time);

        return $this->time_diff;
    }

    /**
     * @param string $start_time
     *
     * @return \App\Lotto\Calendar\UnixTimeBeforeUnix
     */
    public function setStartTime(string $start_time): self
    {
        if (!$start_time) {
            $start_time = time();
        }
        $this->start_time = $start_time;

        return $this;
    }

    /**
     * @param string $end_time
     *
     * @return \App\Lotto\Calendar\UnixTimeBeforeUnix
     */
    public function setEndTime(string $end_time): self
    {
        $this->end_time = $end_time;

        $this->setTimeDiff();

        return $this;
    }
}
