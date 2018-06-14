<?php

namespace DingRobot\Message;

use DingRobot\Message\Traits\Btn;

/**
 * ActionCard
 *
 * @method ActionCard title($title)
 * @method ActionCard text($markdownText)
 *
 * @package DingRobot\Message
 */
class ActionCardBtn extends Base
{
    use Btn;

    /**
     * 隐藏发消息者头像
     * hide sender avatar
     */
    const AVATAR_HIDE = '1';

    /**
     * 显示发消息者头像
     * show sender avatar
     */
    const AVATAR_SHOW = '0';

    /**
     * 按钮横向排列
     */
    const BTN_ORIENTATION_HORIZONTAL = '1';

    /**
     * 按钮竖直排列
     */
    const BTN_ORIENTATION_VERTICAL = '0';

    public function __construct($title = '')
    {
        parent::__construct();
        $this->title($title);
        $this->bodyName = 'actionCard';
    }

    protected function getBody()
    {
        if(!empty($this->btns)) {
            $this->body['btns'] = $this->btns;
        } else {
            throw new \InvalidArgumentException("wrong btns");
        }
        return $this->body;
    }

    protected function bodyFields()
    {
        return [
            'title'       => ['required' => true, 'type' => 'string'],
            'text'        => ['required' => true, 'type' => 'string'],
        ];
    }

    /**
     * hide sender avatar
     * 隐藏发送者头像
     *
     * @return $this
     */
    public function hideAvatar()
    {
        $this->body['hideAvatar'] = self::AVATAR_HIDE;

        return $this;
    }

    /**
     * show sender avatar
     * 显示发送者头像
     *
     * @return $this
     */
    public function showAvatar()
    {
        $this->body['hideAvatar'] = self::AVATAR_SHOW;

        return $this;
    }

    /**
     * 设置按钮横向排列
     * set button as horizontal
     *
     * @return $this
     */
    public function btnOrientationHorizontal()
    {
        $this->body['btnOrientation'] = self::BTN_ORIENTATION_HORIZONTAL;

        return $this;
    }

    /**
     * 设置按钮纵向排列
     * set button as vertical
     *
     * @return $this
     */
    public function btnOrientationVertical()
    {
        $this->body['btnOrientation'] = self::BTN_ORIENTATION_VERTICAL;

        return $this;
    }
}