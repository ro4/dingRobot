<?php

include "../vendor/autoload.php";

use DingRobot\Message\Text;
//
//$msg = new Text('nihao');
//$msg->send();

Text::content('nihao')->at()->send();

//$link = new \DingRobot\Message\Link('title');
//
//$link->text('233')->title('2333')->picUrl('http://233.com')->send();

//$link->send();
