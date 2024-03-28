<?php

namespace app\services\dto;

use yii\base\Arrayable;
use yii\base\ArrayableTrait;
use yii\base\BaseObject;

/**
 * @property string $base
 * @property float[]|string[]|BidAskRate[] $rates
 */
class RatesInfo extends BaseObject implements Arrayable
{
    use ArrayableTrait;

    public string $base;

    public array $rates;

    public function getBase()
    {
        return $this->base;
    }

    public function setBase(string $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getRates()
    {
        return $this->rates;
    }

    public function setRates(array $rates): self
    {
        $this->rates = $rates;

        return $this;
    }
}
