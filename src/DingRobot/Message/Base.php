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

    protected function validate()
    {
        if (empty($this->bodyFields())) {
            return;
        }
        foreach ($this->bodyFields() as $field => $config) {
            $content  = isset($this->body[$field]) ? $this->body[$field] : null;
            $required = isset($config['required']) ? $config['required'] : null;
            $type     = isset($config['type']) ? $config['type'] : null;
            if ($required && !$content) {
                throw new \InvalidArgumentException("{$field} is required");
            }
            if ($type == 'string' && $content && !is_string($content)) {
                throw new \InvalidArgumentException("{$field} must be string");
            }
        }
    }

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

    public function __call($name, $args)
    {
        if (array_key_exists($name, $this->bodyFields())) {
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