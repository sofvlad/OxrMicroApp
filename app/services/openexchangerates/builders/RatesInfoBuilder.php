<?php

namespace app\services\openexchangerates\builders;

use app\services\dto\BidAskRate;
use app\services\dto\RatesInfo;

class RatesInfoBuilder
{
    /**
     * Build RatesInfo DTO
     */
    public function build(array $data, bool $bigAskRareFlag = false): RatesInfo
    {
        $ratesInfo = \Yii::$container->get(RatesInfo::class);
        $ratesInfo->setBase($data['base']);
        if (!$bigAskRareFlag) {
            $ratesInfo->setRates($data['rates']);

            return $ratesInfo;
        }

        $rates = [];
        foreach ($data['rates'] as $currency => $rate) {
            $bidAskRate = \Yii::$container->get(
                BidAskRate::class, 
                [
                    'currency' => $currency,
                    'bid'      => $rate['bid'],
                    'ask'      => $rate['ask'],
                    'mid'      => $rate['mid'],
                ]
            );
            $rates[] = $bidAskRate;
        }
        $ratesInfo->setRates($rates);

        return $ratesInfo;
    }
}
