<?php

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200',
            \DingRobot\Ding::text('233')->appendContent('test')->at(['122', '233'])->at('133')
                ->atAll()->notAtAll()
                ->send('add', $stub));
    }
}