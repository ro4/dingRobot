<?php

namespace DingRobot\Message;

/**
 * Markdown
 *
 * @method Markdown title($title)
 * @method Markdown text($markdownText)
 *
 * @package DingRobot\Message
 */
class Markdown extends Base
{
    public function __construct($title = '')
    {
        parent::__construct();
        $this->title($title);
        $this->bodyName = 'markdown';
    }

    protected function getBody()
    {
        return $this->body;
    }

    protected function bodyFields()
    {
        return [
            'title' => ['required' => true, 'type' => 'string'],
            'text'  => ['required' => true, 'type' => 'string']
        ];
    }
}