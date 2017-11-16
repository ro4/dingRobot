<?php

namespace DingRobot\Message;

class Link extends Base
{
    public function __construct($title = '')
    {
        parent::__construct();
        $this->title = $title;
        $this->bodyName   = 'link';
    }

    function getBody()
    {
        return $this->body;
    }

    function bodyFields()
    {
        return ['title', 'text', 'picUrl', 'messageUrl'];
    }
}