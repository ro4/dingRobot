<?php

require __DIR__ . '/../vendor/autoload.php';

use DingRobot\Ding;

Ding::actionCard('test')->singleURL('http://baidu.com')->text('test')->btns([
    [
        'title' => 'click me',
        'actionURL' => 'http://google.com'
    ]
])->at('1222')->send('tyttt');