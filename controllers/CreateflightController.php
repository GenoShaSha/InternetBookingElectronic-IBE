<?php

namespace app\controllers;

use Yii;
use app\models\Flight;


class CreateflightController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Flight();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model->flight_nr = $data['flight_nr'];
            $model->from = $data['from'];
            $model->to = $data['to'];
            $model->arrival_terminal = $data['arrival_terminal'];
            $model->arrival_date = $data['arrival_date'];
            $model->departure_terminal = $data['departure_terminal'];
            $model->departure_date = $data['departure_date'];
            $model->economy_price = $data['economy_price'];
            $model->business_price = $data['business_price'];
            $model->save();
            return "OK";
        } else {
            return 'error';
        }
    }
}
