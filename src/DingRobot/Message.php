<?php

namespace DingRobot;

class Message implements \JsonSerializable
{
    private $msgtype;
    private $content;
    private $at;

    function jsonSerialize()
    {
        return [
            'msgtype' => $this->msgtype,
            'content' => $this->content,
            'at'      => $this->at
        ];
    }
}
