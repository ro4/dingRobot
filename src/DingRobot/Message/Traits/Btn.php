<?php

namespace DingRobot\Message\Traits;

trait Btn
{
    protected $btns = [];

    protected static $btnFields = ['title', 'actionURL'];

    public function addbtn($btn = [])
    {
        $this->validatebtn($btn);
        $this->btns[] = $btn;
        return $this;
    }

    protected function validatebtn($btn)
    {
        if (!is_array($btn)) {
            throw new \InvalidArgumentException('wrong btn params');
        }
        if (array_diff(array_keys($btn), self::$btnFields)) {
            throw new \InvalidArgumentException('wrong btn params');
        }

        return true;
    }
}