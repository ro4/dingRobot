<?php

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testMakeLink()
    {
        $link = d_make_link('ff', '22', '333');
        $this->assertArrayHasKey('title', $link);
        $this->assertArrayHasKey('messageURL', $link);
        $this->assertArrayHasKey('picURL', $link);

        try {
            d_make_link([], [], []);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }

    public function testMakeBtn()
    {
        $link = d_make_btn('ff', '22');
        $this->assertArrayHasKey('title', $link);
        $this->assertArrayHasKey('actionURL', $link);

        try {
            d_make_btn([], []);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }

    public function testQuick()
    {
        $this->assertInstanceOf(\DingRobot\Message\ActionCardBtn::class,
            d_action_card_btn('ttt', 'tttt', [d_make_btn('tst', 'wee')]));
        $this->assertInstanceOf(\DingRobot\Message\ActionCard::class,
            d_action_card('ttt', 'tttt', 'fdf', 'dsf'));
        $this->assertInstanceOf(\DingRobot\Message\FeedCard::class,
            d_feed_card([d_make_link('sdf', 'sdfdsf', 'ddd')]));
        $this->assertInstanceOf(\DingRobot\Message\Link::class,
            d_link('tt', 'sdfsdf', 'url'));
        $this->assertInstanceOf(\DingRobot\Message\Markdown::class,
            d_markdown('tt', 'sdfsdf'));
        $this->assertInstanceOf(\DingRobot\Message\Text::class,
            d_text('tt'));
    }

    public function testWebHook()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        try {
            d_text('nihao')->send('', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }

        $webHook = 'web_hook';
        d_web_hook($webHook);
        $this->assertEquals($webHook, d_web_hook());
        $this->assertEquals('200', d_text('nihao')->send('', $stub));
    }

}