<?php

namespace app\controllers;

use app\services\openexchangerates\ClientError;
use yii\web\Controller;
use app\services\OpenExchangeRatesService;

class OxrController extends Controller
{
    public function actionLatest()
    {
        /** @var OpenExchangeRatesService $service */
        $service = \Yii::$container->get(OpenExchangeRatesService::class);
        $request = \Yii::$app->getRequest();

        try {
            return $this->asJson($service->latest($request->bodyParams));
        } catch (ClientError $e) {
            return $this->asJson([
                'error'       => true,
                'description' => $e->getMessage()
            ]);
        }
    }
}
