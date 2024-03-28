<?php

namespace app\services;

use app\services\dto\RatesInfo;
use app\services\openexchangerates\builders\RatesInfoBuilder;
use app\services\openexchangerates\Client;
use app\services\openexchangerates\requests\LatestRequest;

class OpenExchangeRatesService
{
    public function __construct(private Client $client)
    {
    }

    /**
     * Get the latest exchange rates
     * 
     * @return RatesInfo
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function latest(array $params): RatesInfo
    {
        // @TODO Perhaps it is possible to implement a cache
        /** @var LatestRequest $latestRequest */
        $request = \Yii::$container->get(LatestRequest::class);
        if (!empty($params['base'])) {
            $request->setBase($params['base']);
        }
        if (!empty($params['symbols'])) {
            $request->setSymbols($params['symbols']);
        }
        if (!empty($params['show_bid_ask'])) {
            $request->setShowBidAsk((bool)$params['show_bid_ask']);
        }

        /** @var Client $client */
        $client = \Yii::$container->get(Client::class);

        $response = $client->send($request);

        /** @var RatesInfo $ratesInfo */
        $ratesInfoBuilder = \Yii::$container->get(RatesInfoBuilder::class);
        $ratesInfo = $ratesInfoBuilder->build($response, (bool)($params['show_bid_ask'] ?? false));

        return $ratesInfo;
    }
}
