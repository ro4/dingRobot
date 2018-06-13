<?php

use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');
        $this->assertEquals('200',
            \DingRobot\Ding::link('233')->text('mark')->messageUrl('title')->at(['122', '233'])
                ->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub));
    }
}