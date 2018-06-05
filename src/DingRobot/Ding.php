<?php

namespace DingRobot;

use DingRobot\Message\ActionCard;
use DingRobot\Message\FeedCard;
use DingRobot\Message\Link;
use DingRobot\Message\Markdown;
use DingRobot\Message\Text;

class Ding
{
    public static function ActionCard($title = '')
    {
        return new ActionCard($title);
    }

    public static function FeedCard($links = null)
    {
        return new FeedCard($links);
    }

    public static function Link($title = '')
    {
        return new Link($title);
    }

    public static function Markdown($title = '')
    {
        return new Markdown($title);
    }

    public static function Text($content = '')
    {
        return new Text($content);
    }
}
