# dingRobot
钉钉机器人 PHP 库  
[![Build Status](https://travis-ci.org/ro4/dingRobot.svg?branch=master)](https://travis-ci.org/ro4/dingRobot)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ro4/dingRobot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ro4/dingRobot/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ro4/dingRobot/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ro4/dingRobot/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ro4/dingRobot/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ro4/dingRobot/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/ro4/dingRobot/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

**使用前先阅读[钉钉官方文档](https://open-doc.dingtalk.com/docs/doc.htm?treeId=257&articleId=105735&docType=1)**

## 使用方法

1. `composer require ro4/ding-robot` 引入。

2. demo

```php
<?php

require_once "./vendor/autoload.php";

d_web_hook('https://oapi.dingtalk.com/robot/send?access_token=YOURTOKEN');
$picUrl = "http://ww3.sinaimg.cn/mw600/0073tLPGgy1fsbnnn4ldvj30dw0k1n09.jpg";
$md     = new \DavidBadura\MarkdownBuilder\MarkdownBuilder();
$md->p($md->inlineImg($picUrl, '福利'));

// 测试文字消息
d_text('测试文字消息')->send();
//
// 测试 @所有人
d_text('测试 at 所有人')->atAll()->send();
//
// 测试 ActionCard
d_action_card('测试整体跳转Action Card', $md->getMarkdown(), '查看高清大图', $picUrl)->send();

// 测试 ActionCard Buttons
$acb = d_action_card_btn('测试带按钮的Action Card', $md->getMarkdown(),
    [d_make_btn('图1', $picUrl), d_make_btn('图2', $picUrl)]);

$acb->send();

$acb->showAvatar()->btnOrientationVertical()->title('按钮横向排列')->send();

$acb->hideAvatar()->title('隐藏头像')->send();

d_feed_card([d_make_link('测试 feed card', $picUrl, $picUrl), d_make_link('link2', $picUrl, $picUrl)])->send();

d_link('测试 link', $md->getMarkdown(), $picUrl, $picUrl)->send();

d_markdown('测试 markdown', $md->getMarkdown())->send();

```
