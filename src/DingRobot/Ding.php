<?php

namespace DingRobot;

use DingRobot\Message\ActionCard;
use DingRobot\Message\ActionCardBtn;
use DingRobot\Message\FeedCard;
use DingRobot\Message\Link;
use DingRobot\Message\Markdown;
use DingRobot\Message\Text;

class Ding
{
    public static function actionCard($title = '')
    {
        return new ActionCard($title);
    }

    public static function actionCardBtn($title = '')
    {
        return new ActionCardBtn($title);
    }

    public static function feedCard($links = null)
    {
        return new FeedCard($links);
    }

    public static function link($title = '')
    {
        return new Link($title);
    }

    public static function markdown($title = '')
    {
        return new Markdown($title);
    }

    public static function text($content = '')
    {
        return new Text($content);
    }
}
