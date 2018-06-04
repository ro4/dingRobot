<?php

require __DIR__.'/../vendor/autoload.php';

use DingRobot\Message\ActionCard;
use DavidBadura\MarkdownBuilder\MarkdownBuilder;

$md = new MarkdownBuilder();
$md->h1('nihao')->code('echo ', 'php');

ActionCard::title('test')->text($md->getMarkdown())->showAvatar()->send();