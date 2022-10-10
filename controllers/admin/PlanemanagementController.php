<?php

namespace app\controllers\admin;


use app\models\Plane;
use Yii;

class PlanemanagementController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $model = new Plane();
        $allPlane = $model->findAllPlane();
        return $this->render('index', ['allPlane' => $allPlane]);
    }


    public function actionSearch()
    {
        $model = new Plane();
        $data = Yii::$app->request->post();
        $param = $data['iden'];
        $foundPlane = $model->findByPlaneNr($param);
        return $foundPlane;
    }
}
