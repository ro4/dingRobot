<?php

if (!function_exists('make_btn')) {

    /**
     * 生成 button 辅助函数
     *
     * @param string $title     按钮文案
     * @param string $actionURL 按钮跳转地址
     *
     * @return array
     */
    function make_btn($title, $actionURL)
    {
        if (!is_string($title) || !is_string($actionURL)) {
            throw new \InvalidArgumentException('wrong btn params');
        }
        return compact('title', 'actionURL');
    }
}

if (!function_exists('make_link')) {

    /**
     * 生成 link 辅助函数
     *
     * @param string $title      链接标题
     * @param string $messageURL 跳转链接
     * @param string $picURL     图片地址
     *
     * @return array
     */
    function make_link($title, $messageURL, $picURL)
    {
        if (!is_string($title) || !is_string($messageURL) || !is_string($picURL)) {
            throw new \InvalidArgumentException('wrong link params');
        }
        return compact('title', 'messageURL', 'picURL');
    }
}