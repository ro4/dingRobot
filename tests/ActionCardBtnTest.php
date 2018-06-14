<?php

use PHPUnit\Framework\TestCase;

class ActionCardBtnTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200', \DingRobot\Ding::actionCardBtn('233')->text('ffff')
            ->btns([d_make_btn('ff', 'eee')])
            ->appendBtn(d_make_btn('ee', 'dfd'))
            ->showAvatar()->hideAvatar()
            ->btnOrientationHorizontal()->btnOrientationVertical()
            ->at(['122', '233'])->at('133')
            ->atAll()->notAtAll()
            ->send('add', $stub));
    }

    public function testParamsException()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        try {
            \DingRobot\Ding::actionCardBtn('233')
                ->text('markdown')
                ->send('add', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }


        try {
            \DingRobot\Ding::actionCardBtn('233')
                ->text('fff')
                ->appendBtn(['ni' => 1])
                ->send('add', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }

        try {
            \DingRobot\Ding::actionCardBtn('233')
                ->text(['ttt'])
                ->btns(['nihao'])
                ->send('add', $stub);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }
}