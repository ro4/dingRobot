<?php

namespace DingRobot\Message\Traits;

trait At
{
    protected $mobiles = [];
    protected $all = false;

    public function at($someone = null)
    {
        if (is_string($someone) || is_numeric($someone)) {
            $this->mobiles[] = $someone;
        } elseif (is_array($someone)) {
            $this->atMobiles = array_merge($this->mobiles, $someone);
        }
        return $this;
    }

    public function atAll()
    {
        $this->all = true;
        return $this;
    }

    public function notAtAll()
    {
        $this->all = false;
        return $this;
    }

    public function getAt()
    {
        if ($this->mobiles || $this->all) {
            return [
                'atMobiles' => $this->mobiles,
                'isAtAll'   => $this->all,
            ];
        } else {
            return [];
        }
    }
}