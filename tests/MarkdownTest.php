<?php

use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    public function testSend()
    {
        $stub = $this->createMock(\DingRobot\Requester\CurlRequester::class);

        $stub->method('request')->willReturn('200');

        $this->assertEquals('200',
            \DingRobot\Ding::markdown('233')->text('markdown')->send('add', $stub));
    }
}