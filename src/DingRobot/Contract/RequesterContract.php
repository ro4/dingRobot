<?php
namespace DingRobot\Contract;

interface RequesterContract
{
    public function request($remote_server, $post_string);
}