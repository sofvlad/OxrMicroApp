<?php

namespace app\services\openexchangerates\requests;

interface RequestInterface
{
    /**
     * Get method type
     * 
     * @return string
     */
    public function getMethod(): string;

    /**
     * Get url path
     * 
     * @return string
     */
    public function getUrlPath(): string;

    /**
     * Get all params
     * 
     * @return array
     */
    public function getParams(): array;
}
