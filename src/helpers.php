<?php

if (!function_exists('d_make_btn')) {

    /**
     * 生成 button 辅助函数
     *
     * @param string $title     按钮文案
     * @param string $actionURL 按钮跳转地址
     *
     * @return array
     */
    function d_make_btn($title, $actionURL)
    {
        if (!is_string($title) || !is_string($actionURL)) {
            throw new \InvalidArgumentException('wrong btn params');
        }
        return compact('title', 'actionURL');
    }
}

if (!function_exists('d_make_link')) {

    /**
     * 生成 link 辅助函数
     *
     * @param string $title      链接标题
     * @param string $messageURL 跳转链接
     * @param string $picURL     图片地址
     *
     * @return array
     */
    function d_make_link($title, $messageURL, $picURL)
    {
        if (!is_string($title) || !is_string($messageURL) || !is_string($picURL)) {
            throw new \InvalidArgumentException('wrong link params');
        }
        return compact('title', 'messageURL', 'picURL');
    }
}

if (!function_exists('d_action_card')) {

    /**
     * 快速生成 action card 辅助函数
     *
     * @param string $title       标题
     * @param string $text        markdown 格式摘要
     * @param string $singleTitle 单个按钮文案
     * @param string $singleURL   按钮跳转地址
     *
     * @return \DingRobot\Message\ActionCard
     */
    function d_action_card($title, $text, $singleTitle, $singleURL)
    {
        return \DingRobot\Ding::actionCard($title)->text($text)->singleTitle($singleTitle)
            ->singleURL($singleURL);
    }
}

if (!function_exists('d_action_card_btn')) {

    /**
     * 快速生成 action_card_btn 辅助函数
     *
     * @param string $title 标题
     * @param string $text  markdown 格式摘要
     * @param array  $btns  按钮
     *
     * @return \DingRobot\Message\ActionCardBtn
     */
    function d_action_card_btn($title, $text, array $btns)
    {
        return \DingRobot\Ding::actionCardBtn($title)->text($text)->btns($btns);
    }
}

if (!function_exists('d_feed_card')) {

    /**
     * 快速生成 action card 辅助函数
     *
     * @param array $links 链接
     *
     * @return \DingRobot\Message\FeedCard
     */
    function d_feed_card(array $links)
    {
        return \DingRobot\Ding::feedCard($links);
    }
}

if (!function_exists('d_link')) {

    /**
     * 快速生成 Link 辅助函数
     *
     * @param string      $title      标题
     * @param string      $text       markdown 格式摘要
     * @param string      $messageUrl 点击消息跳转的URL
     * @param string|null $picUrl     图片地址
     *
     * @return \DingRobot\Message\Link
     */
    function d_link($title, $text, $messageUrl, $picUrl = '')
    {
        return \DingRobot\Ding::link($title)->text($text)->messageUrl($messageUrl)->picUrl($picUrl);
    }
}

if (!function_exists('d_markdown')) {

    /**
     * 快速生成 Markdown 辅助函数
     *
     * @param string $title 标题
     * @param string $text  markdown 格式摘要
     *
     * @return \DingRobot\Message\Markdown
     */
    function d_markdown($title, $text)
    {
        return \DingRobot\Ding::markdown($title)->text($text);
    }
}

if (!function_exists('d_text')) {

    /**
     * 快速生成 Text 辅助函数
     *
     * @param string $content 内容
     *
     * @return \DingRobot\Message\Text
     */
    function d_text($content)
    {
        return \DingRobot\Ding::text($content);
    }
}

if (!function_exists('d_web_hook')) {

    /**
     * 设置 或者 获取 web hook 地址
     *
     * @param string|null $web_hook_val web hook 地址
     *
     * @return mixed
     */
    function d_web_hook($web_hook_val = null)
    {
        static $web_hook;

        if ($web_hook_val) {
            $web_hook = $web_hook_val;
        }

        return $web_hook;
    }
}