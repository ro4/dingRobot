<?php

namespace DingRobot\Message;

use DingRobot\Message\Traits\Link as TraitLink;

/**
 * FeedCard
 *
 * @package DingRobot\Message
 */
class FeedCard extends Base
{
    use TraitLink;

    public function __construct($links = null)
    {
        parent::__construct();
        $this->bodyName = 'feedCard';
        if ($links) {
            $this->body['links'] = $links;
        }
    }

    protected function getBody()
    {
        $this->body['links'] = array_merge($this->links, $this->body['links']);
        foreach ($this->body['links'] as $link) {
            $this->validateLink($link);
        }
        return $this->body;
    }

    protected function bodyFields()
    {
        return [];
    }
}