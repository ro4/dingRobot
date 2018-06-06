<?php

namespace DingRobot\Message;

use DingRobot\Contract\RequesterContract;
use DingRobot\Message\Traits\At;
use DingRobot\Requester\CurlRequester;

/**
 * Base Class
 *
 * @package DingRobot\Message
 */
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

    public function jsonSerialize()
    {
        return [
            'msgtype'       => $this->bodyName,
            $this->bodyName => static::getBody(),
        ] + $this->getAt() ?: [];
    }

    abstract protected function getBody();

    abstract protected function bodyFields();

    /**
     * 发送
     * send
     *
     * @param string $address 接口地址
     * @param RequesterContract   $requester
     *
     * @return mixed
     */
    public function send($address = '', RequesterContract $requester = null)
    {
        if ($requester) {
            return $requester->request($address, json_encode(static::jsonSerialize()));
        } else {
            return (new CurlRequester())->request($address, json_encode(static::jsonSerialize()));
        }
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
}