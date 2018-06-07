<?php

use PHPUnit\Framework\TestCase;

class FeedCardTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $link = ['title' => 'title', 'messageURL' => 'title', 'picURL' => 'title'];
        $this->assertEquals('200',
            \DingRobot\Ding::feedCard([$link])->links([$link])->appendLink($link)->at(['122', '233'])
                ->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub));
    }

    public function testException()
    {
        try {
            \DingRobot\Ding::feedCard()->ttt();
        } catch (\Exception $e) {
            $this->assertInstanceOf(\BadMethodCallException::class, $e);
        }
    }

    public function testLinkException()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');
        try {
            $link = ['title' => 'title', 'messagURL' => 'title', 'picURL' => 'title'];
            $this->assertEquals('200',
                \DingRobot\Ding::feedCard([$link])->links([$link])->appendLink($link)->at(['122', '233'])
                    ->at('133')
                    ->atAll()->notAtAll()
                    ->send('add', $stub));
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }

        try {
            $link = ['title' => 'title', 'messagURL' => 'title', 'picURL' => 'title'];
            $this->assertEquals('200',
                \DingRobot\Ding::feedCard([$link])->links([$link])->appendLink('link')->at(['122', '233'])
                    ->at('133')
                    ->atAll()->notAtAll()
                    ->send('add', $stub));
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }
}