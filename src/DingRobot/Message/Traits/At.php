<?php

namespace DingRobot\Message\Traits;

trait At
{
    protected $mobiles = [];
    protected $all = false;

    /**
     * at 某人
     * at someone
     *
     * @param string $someone
     *
     * @return $this
     */
    public function at($someone = null)
    {
        if (is_string($someone) || is_numeric($someone)) {
            $this->mobiles[] = (string)$someone;
        } elseif (is_array($someone)) {
            $this->atMobiles = array_merge($this->mobiles, $someone);
        }
        return $this;
    }

    /**
     * set at all active
     * at 全部人
     *
     * @return $this
     */
    public function atAll()
    {
        $this->all = true;
        return $this;
    }

    /**
     * cancel at all
     * 取消 at 全部人
     *
     * @return $this
     */
    public function notAtAll()
    {
        $this->all = false;
        return $this;
    }


    protected function getAt()
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