<?php

require __DIR__.'/../vendor/autoload.php';

use DavidBadura\MarkdownBuilder\MarkdownBuilder;

$md = new MarkdownBuilder();
$md->h1('nihao')->code('echo ', 'php');

\DingRobot\Ding::markdown('tt')->text($md->getMarkdown())->send();