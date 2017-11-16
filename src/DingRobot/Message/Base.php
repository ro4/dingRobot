<?php

namespace DingRobot\Message;

use DingRobot\Message\Traits\At;

abstract class Base implements \JsonSerializable
{
    use At;
    protected $bodyName;
    protected $at;
    protected $body;

    public function __construct()
    {
        $this->body = array_fill_keys(static::bodyFields(), '');
    }

    function jsonSerialize()
    {
        return [
            'msgtype'       => $this->bodyName,
            $this->bodyName => static::getBody(),
        ] + $this->getAt() ?: [];
    }

    abstract function getBody();

    abstract function bodyFields();

    public function send()
    {
        var_dump(json_encode(static::jsonSerialize()));
        exit;
        $this->request_by_curl('fsadfdsa', json_encode(static::jsonSerialize()));
    }

    public function __call($name, $args)
    {
        if (isset($this->body[$name])) {
            $this->body[$name] = isset($args[0]) ? $args[0] : '';
        } else {
            throw new \BadMethodCallException("field {$name} not found");
        }

        return $this;
    }

    public static function __callStatic($name, $args)
    {
        return (new static)->$name(...$args);
    }

    function request_by_curl($remote_server, $post_string)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $remote_server);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}