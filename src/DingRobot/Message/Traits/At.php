<?php

namespace DingRobot\Message\Traits;

trait At
{
    protected $mobiles = [];
    protected $all = false;

    public function at($someone)
    {
        if (is_string($someone)) {
            $this->mobiles[] = $someone;
        } elseif (is_array($someone)) {
            $this->atMobiles = array_merge($this->mobiles, $someone);
        } else {
            return false;
        }

        return true;
    }

    public function atAll()
    {
        $this->all = true;
    }

    public function notAtAll()
    {
        $this->all = false;
    }

    public function getAt()
    {
        return [
            'atMobiles' => $this->mobiles,
            'isAtAll'   => $this->all,
        ];
    }
}