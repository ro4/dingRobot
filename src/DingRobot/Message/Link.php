<?php

namespace DingRobot\Message;

class Link extends Base
{
    public function __construct($title = '')
    {
        parent::__construct();
        $this->title = $title;
        $this->obj   = 'link';
    }

    function getArray()
    {
        return $this->body;
    }

    function bodyFields()
    {
        return ['title', 'text', 'picUrl', 'messageUrl'];
    }
}