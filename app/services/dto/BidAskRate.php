<?php

namespace app\services\dto;

use yii\base\Arrayable;
use yii\base\ArrayableTrait;
use yii\base\BaseObject;

/**
 * @property string $currency
 * @property float $bid
 * @property float $ask
 * @property float $mid
 */
class BidAskRate extends BaseObject implements Arrayable
{
    use ArrayableTrait;

    public string $currency;

    public float $bid;

    public float $ask;

    public float $mid;

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function setBid(float $bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    public function getAsk()
    {
        return $this->ask;
    }

    public function setAsk(float $ask): self
    {
        $this->ask = $ask;

        return $this;
    }

    public function getMid()
    {
        return $this->mid;
    }

    public function setMid(float $mid): self
    {
        $this->mid = $mid;

        return $this;
    }
}
