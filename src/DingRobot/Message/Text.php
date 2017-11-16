<?php

namespace DingRobot\Message;

class Text extends Base
{
    public function __construct($content = '')
    {
        parent::__construct();
        $this->body['content'] = $content;
        $this->bodyName        = 'text';
    }

    function getBody()
    {
        return $this->body;
    }

    function bodyFields()
    {
        return ['content'];
    }
}