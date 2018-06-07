<?php

use PHPUnit\Framework\TestCase;

class ActionCardTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200', \DingRobot\Ding::actionCard('233')->btns([
            make_btn('click', 'www.google.com')
        ])->appendBtn(make_btn('click', 'www.google.com'))->showAvatar()->hideAvatar()
            ->btnOrientationHorizontal()->btnOrientationVertical()
            ->at(['122', '233'])->at('133')
            ->atAll()->notAtAll()
            ->send('add', $stub));
    }

    public function testStaticSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200',
            \DingRobot\Message\ActionCard::title('233')->btns([make_btn('click', 'www.google.com')])
                ->appendBtn(make_btn('click', 'www.google.com'))->showAvatar()->hideAvatar()
                ->btnOrientationHorizontal()->btnOrientationVertical()
                ->at(['122', '233'])->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub));
    }

    public function testBtnException()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        try {
            \DingRobot\Ding::actionCard('233')->btns([
                make_btn('click', 'www.google.com')
            ])->appendBtn(['ttt' => '122', 'test'])->showAvatar()->hideAvatar()
                ->btnOrientationHorizontal()->btnOrientationVertical()
                ->at(['122', '233'])->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }

        try {
            \DingRobot\Ding::actionCard('233')->btns([
                make_btn('click', 'www.google.com')
            ])->appendBtn('btn')->showAvatar()->hideAvatar()->btnOrientationHorizontal()
                ->btnOrientationVertical()
                ->at(['122', '233'])->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }
}