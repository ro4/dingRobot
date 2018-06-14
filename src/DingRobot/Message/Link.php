<?php

namespace DingRobot\Message;

/**
 * Link
 *
 * @method Link title($title)
 * @method Link text($markdownText)
 * @method Link picUrl($picUrl)
 * @method Link messageUrl($messageUrl)
 *
 * @package DingRobot\Message
 */
class Link extends Base
{
    public function __construct($title = '')
    {
        parent::__construct();
        $this->title($title);
        $this->bodyName = 'link';
    }

    protected function getBody()
    {
        return $this->body;
    }

    protected function bodyFields()
    {
        return [
            'title'      => ['required' => true, 'type' => 'string'],
            'text'       => ['required' => true, 'type' => 'string'],
            'picUrl'     => ['required' => false, 'type' => 'string'],
            'messageUrl' => ['required' => true, 'type' => 'string'],
        ];
    }
}