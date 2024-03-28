<?php

namespace app\services\openexchangerates\requests;

class LatestRequest extends RequestAbstract
{
    /**
     * @inheritdoc
     */
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @inheritdoc
     */
    public function getUrlPath(): string
    {
        return 'latest.json';
    }

    /**
     * Set symbols param
     * 
     * @param string @value
     * 
     * @return self
     */
    public function setBase(string $base): self
    {
        $this->setParam('base', $base);

        return $this;
    }

    /**
     * Set symbols param
     * 
     * @param string|array @symbols
     * 
     * @return self
     */
    public function setSymbols(mixed $symbols): self
    {
        $this->setParam('symbols', is_array($symbols) ? implode(',', $symbols) : $symbols);

        return $this;
    }

    /**
     * Set show bid-ask param
     * 
     * @param bool @showBigAsk
     * 
     * @return self
     */
    public function setShowBidAsk(bool $showBigAsk): self
    {
        $this->setParam('show_bid_ask', $showBigAsk);

        return $this;
    }
}
