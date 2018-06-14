<?php

namespace DingRobot\Message;

/**
 * Text
 *
 * @method Text content($content)
 *
 * @package DingRobot\Message
 */
class Text extends Base
{

    public function __construct($content = '')
    {
        parent::__construct();
        $this->content($content);
        $this->bodyName = 'text';
    }

    protected function getBody()
    {
        return $this->body;
    }

    protected function bodyFields()
    {
        return ['content' => ['required' => true, 'type' => 'string']];
    }

    /**
     * append content
     * 追加内容
     *
     * @param string $content
     *
     * @return $this
     */
    public function appendContent($content = '')
    {
        $this->body['content'] .= $content;

        return $this;
    }
}