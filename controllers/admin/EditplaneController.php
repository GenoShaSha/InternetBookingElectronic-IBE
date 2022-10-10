<?php

namespace app\controllers\admin;
use Yii;
use app\models\Plane;


class EditplaneController extends \yii\web\Controller
{
    public function actionIndex()
    { 
        return $this->render('index');
    }

    
    public function actionUpdate()
    {
        $model = new Plane();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectByPlaneNr($data['plane_nr']);
            // $model->plane_nr = $data['plane_nr'];
            $model->plane_name = $data['plane_name'];
            $model->seat_columns = $data['seat_columns'];
            $model->seat_rows = $data['seat_rows'];
            $model->seat_rows_business = $data['seat_rows_business'];
            $model->update();
            return "OK";
        } else {
            return 'error';
        }
    }
}
