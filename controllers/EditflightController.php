<?php

namespace app\controllers;

use Yii;
use app\models\Flight;


class EditflightController extends \yii\web\Controller
{
    
    public function actionIndex()
    { 
        return $this->render('index');
    }

    
    public function actionUpdate()
    {
        $model = new Flight();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectByFlightId($data['flight_id']);
            $model->flight_nr = $data['flight_nr'];
            $model->from = $data['from'];
            $model->to = $data['to'];
            $model->arrival_terminal = $data['arrival_terminal'];
            $model->arrival_date = $data['arrival_date'];
            $model->departure_terminal = $data['departure_terminal'];
            $model->departure_date = $data['departure_date'];
            $model->economy_price = $data['economy_price'];
            $model->business_price = $data['business_price'];
            $model->update();
            return "OK";
        } else {
            return 'error';
        }
    }

}
