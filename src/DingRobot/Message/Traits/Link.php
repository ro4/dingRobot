<?php

namespace DingRobot\Message\Traits;

trait Link
{
    protected $links = [];

    protected static $linkFields = ['title', 'messageURL', 'picURL'];

    /**
     * init links
     * 初始化 links
     *
     * @param $links
     *
     * @return $this
     */
    public function links($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * append link
     * 追加 link
     *
     * @param array $link
     *
     * @return $this
     */
    public function appendLink($link = [])
    {
        $this->validateLink($link);
        $this->links[] = $link;
        return $this;
    }

    /**
     * validate link
     * 校验 link
     *
     * @param $link
     *
     * @return bool
     */
    protected function validateLink($link)
    {
        if (!is_array($link)) {
            throw new \InvalidArgumentException('wrong link params');
        }
        if (array_diff(array_keys($link), self::$linkFields)) {
            throw new \InvalidArgumentException('wrong link params');
        }

        return true;
    }
}