<?php

namespace DingRobot\Message\Traits;

trait Btn
{
    protected $btns = [];

    protected static $btnFields = ['title', 'actionURL'];

    public function btns($btns)
    {
        if (!empty($btns) && is_array($btns)) {
            foreach ($btns as $btn) {
                $this->validateBtn($btn);
            }
        }
        $this->btns = $btns;

        return $this;
    }

    /**
     * append button
     * 追加按钮
     *
     * @param array $btn
     *
     * @return $this
     */
    public function appendBtn($btn = [])
    {
        $this->validateBtn($btn);
        $this->btns[] = $btn;

        return $this;
    }

    /**
     * validate button
     * 校验按钮
     *
     * @param $btn
     *
     * @return bool
     */
    protected function validateBtn($btn)
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