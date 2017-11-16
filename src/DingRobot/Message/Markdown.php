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

    protected function getBody()
    {
        return $this->body;
    }

    protected function bodyFields()
    {
        return ['title', 'text'];
    }
}