<?php

namespace app\controllers\public;
use Yii;
use app\models\Bookingflight;


class TripsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSearch()
    {
        $model = new Bookingflight();
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $newUser = $model-> findCustomerByEmail($data['email']);
            if ($newUser->validatePassword($data['password'])) {
                Yii::$app->user->login($newUser);
            }
            return $this->redirect(['public/site/index']);
        }     }

}
