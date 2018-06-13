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
    /**
     * @var string
     */
    protected $bodyName;
    protected $at;
    protected $body;

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return [
            'msgtype'       => $this->bodyName,
            $this->bodyName => $this->getBody(),
        ] + $this->getAt() ?: [];
    }

    abstract protected function getBody();

    abstract protected function bodyFields();

    abstract protected function validate();

    /**
     * 发送
     * send
     *
     * @param string            $address 接口地址
     * @param RequesterContract $requester
     *
     * @return mixed
     */
    public function send($address = '', RequesterContract $requester = null)
    {
        $this->validate();
        if ($requester) {
            return $requester->request($address, json_encode($this->jsonSerialize()));
        } else {
            return (new CurlRequester())->request($address, json_encode($this->jsonSerialize()));
        }
    }

    protected function check($name, $required = true, $type = 'string')
    {
        $content = isset($this->body[$name]) ? $this->body[$name] : null;

        if ($required && !$content) {
            throw new \InvalidArgumentException("{$name} is required");
        }

        if ($type == 'string' && $content && !is_string($content)) {
            throw new \InvalidArgumentException("{$name} must be {$type}");
        }
    }


    public function __call($name, $args)
    {
        if (in_array($name, $this->bodyFields())) {
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