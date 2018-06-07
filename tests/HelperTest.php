<?php

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testMakeLink()
    {
        $link = make_link('ff', '22', '333');
        $this->assertArrayHasKey('title', $link);
        $this->assertArrayHasKey('messageURL', $link);
        $this->assertArrayHasKey('picURL', $link);

        try {
            make_link([], [], []);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }

    public function testMakeBtn()
    {
        $link = make_btn('ff', '22');
        $this->assertArrayHasKey('title', $link);
        $this->assertArrayHasKey('actionURL', $link);

        try {
            make_btn([], []);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
        }
    }

}