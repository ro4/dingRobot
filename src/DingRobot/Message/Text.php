<?php

namespace DingRobot\Message;

class Text extends Base
{
    public function __construct($content = '')
    {
        parent::__construct();
        $this->body['content'] = $content;
        $this->obj             = 'text';
    }

    function getArray()
    {
        return $this->body;
    }

    function bodyFields()
    {
        return ['content'];
    }
}