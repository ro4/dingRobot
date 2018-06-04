<?php

namespace DingRobot\Message\Traits;

trait Link
{
    protected $links = [];

    protected static $linkFields = ['title', 'messageURL', 'picURL'];

    public function links($links)
    {
        $this->links = $links;
    }

    public function addLink($link = [])
    {
        $this->validateLink($link);
        $this->links[] = $link;
        return $this;
    }

    protected function validateLink($link)
    {
        if (!is_array($link)) {
            throw new \InvalidArgumentException('wrong link params');
        }
        if (array_diff(array_keys($link), self::$linkFields)) {
            throw new \InvalidArgumentException('wrong link params');
        }

        return true;
    }
}