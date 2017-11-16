<?php

namespace DingRobot\Message;

class Markdown extends Base
{
    public function __construct($title = '')
    {
        parent::__construct();
        $this->body['title'] = $title;
        $this->bodyName      = 'markdown';
    }

    function getBody()
    {
        return $this->body;
    }

    function bodyFields()
    {
        return ['title', 'text'];
    }
}