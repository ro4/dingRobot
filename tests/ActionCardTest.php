<?php

use PHPUnit\Framework\TestCase;

class ActionCardTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200', \DingRobot\Ding::actionCard('233')->btns([
            [
                'title'     => 'click',
                'actionURL' => 'www.baidu.com'
            ]
        ])->appendBtn([
            'title'     => 'click',
            'actionURL' => 'www.baidu.com'
        ])->showAvatar()->hideAvatar()->btnOrientationHorizontal()->btnOrientationVertical()
            ->at(['122', '233'])->at('133')
            ->atAll()->notAtAll()
            ->send('add', $stub));
    }

    public function testStaticSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200', \DingRobot\Message\ActionCard::title('233')->btns([
            [
                'title'     => 'click',
                'actionURL' => 'www.baidu.com'
            ]
        ])->appendBtn([
            'title'     => 'click',
            'actionURL' => 'www.baidu.com'
        ])->showAvatar()->hideAvatar()->btnOrientationHorizontal()->btnOrientationVertical()
            ->at(['122', '233'])->at('133')
            ->atAll()->notAtAll()
            ->send('add', $stub));
    }
}