<?php

namespace DingRobot\Message;

use DingRobot\Message\Traits\Btn;

/**
 * ActionCard
 *
 * @method ActionCard title($title)
 * @method ActionCard text($markdownText)
 * @method ActionCard singleURL($singleUrl)
 *
 * @package DingRobot\Message
 */
class ActionCard extends Base
{
    use Btn;

    // 0-正常发消息者头像,1-隐藏发消息者头像
    const AVATAR_HIDE = '1';
    const AVATAR_SHOW = '0';

    // 0-按钮竖直排列，1-按钮横向排列
    const BTN_ORIENTATION_HORIZONTAL = '1';
    const BTN_ORIENTATION_VERTICAL   = '0';

    public function __construct($title = '')
    {
        parent::__construct();
        $this->title    = $title;
        $this->bodyName = 'actionCard';
    }

    protected function getBody()
    {
        $this->body['btns'] = $this->btns;
        foreach ($this->body['btns'] as $btn) {
            $this->validatebtn($btn);
        }
        return $this->body;
    }

    protected function bodyFields()
    {
        return ['title', 'text', 'singleURL'];
    }

    public function hideAvatar()
    {
        $this->body['hideAvatar'] = self::AVATAR_HIDE;

        return $this;
    }

    public function showAvatar()
    {
        $this->body['hideAvatar'] = self::AVATAR_SHOW;

        return $this;
    }

    public function btnOrientationHorizontal()
    {
        $this->body['btnOrientation'] = self::BTN_ORIENTATION_HORIZONTAL;

        return $this;
    }

    public function btnOrientationVertical()
    {
        $this->body['btnOrientation'] = self::BTN_ORIENTATION_VERTICAL;

        return $this;
    }
}