<?php

namespace app\services\openexchangerates\requests;

abstract class RequestAbstract implements RequestInterface
{
    private array $params = [];

    /**
     * @inheritdoc
     */
    abstract public function getMethod(): string;

    /**
     * @inheritdoc
     */
    abstract public function getUrlPath(): string;

    /**
     * @param string $key
     * @param string $value
     * 
     * @return self
     */
    protected function setParam(string $key, string $value): self
    {
        $this->params[$key] = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
