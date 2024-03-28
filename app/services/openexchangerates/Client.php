<?php

namespace app\services\openexchangerates;

use app\services\openexchangerates\requests\RequestInterface;
use yii\httpclient\Client as HttpClient;
use yii\log\Logger;

class Client
{
    CONST API_URL = 'https://openexchangerates.org/api';

    CONST COUNT_ATTEMPTS = 5;

    public function __construct(
        private HttpClient $httpClient,
        private Logger $logger
    ) {
    }

    /**
     * Send request and return response
     * 
     * @param RequestInterface $request
     * 
     * @return array
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function send(RequestInterface $request): array
    {
        if (empty(\Yii::$app->params['openexchangeratesAppId'])) {
            $this->logger->log('OpenExchangeRates App Id is not set', Logger::LEVEL_ERROR);

            throw new ClientError('Request processing error. Please contact the administration.');
        }

        try {
            $attempts = 1;
            while ($attempts <= static::COUNT_ATTEMPTS) {
                $params = $request->getParams();
                $client = $this->httpClient->createRequest()
                    ->setHeaders([
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Token ' . \Yii::$app->params['openexchangeratesAppId'],
                    ])
                    ->setMethod($request->getMethod())
                    ->setUrl([self::API_URL . '/' . $request->getUrlPath(), ...$params]);

                $this->logger->log('OpenExchangeRates send request ' . $client->getFullUrl(), Logger::LEVEL_INFO);

                $response = $client->send();

                if (!$response->isOk) {
                    if (!empty($response->data['description'])) {
                        $this->logger->log(
                            'OpenExchangeRates request error: ' . $response->data['description'],
                            Logger::LEVEL_ERROR
                        );
                    }
                    if (in_array($response->getStatusCode(), [400, 401])) {
                        throw new ClientError('Request processing error. Please contact the administration.');
                    }
                    $attempts++;
                    continue;
                }

                return $response->data;
            }
        } catch (\Throwable $e) {
            throw new ClientError('Request processing error. Please contact the administration.');
        }

        throw new ClientError(
            'It temporarily impossible to process this request. Please try again later or contact the administration.'
        );
    }
}
