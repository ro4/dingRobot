<?php

require __DIR__.'/../vendor/autoload.php';

use DingRobot\Message\Markdown;
use DavidBadura\MarkdownBuilder\MarkdownBuilder;

$md = new MarkdownBuilder();
$md->h1('nihao')->code('echo ', 'php');

Markdown::title('test')->text($md->getMarkdown())->send();