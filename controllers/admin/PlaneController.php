<?php

namespace app\controllers\admin;

use Yii;
use app\models\Plane;
use app\models\Seat;
use Error;

class PlaneController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new Plane();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model->plane_nr = $data['plane_nr'];
            $model->plane_name = $data['plane_name'];
            $model->seat_columns = $data['seat_columns'];
            $model->seat_rows = $data['seat_rows'];
            $model->seat_rows_business = $data['seat_rows_business'];

            $planeNr = $data['plane_nr'];
            $rows =  $data['seat_rows'];
            $columns = $data['seat_columns'];
            $businessRows = $data['seat_rows_business'];
            $letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            $model->save();

            $seatNr = '';

            for ($i = 0; $i < $rows; $i++) {
                $seatNr = $letters[$i];
                for ($y = 1; $y < $columns + 1; $y++) {
                    $model1 = new Seat();
                    $seatNr = $letters[$i];
                    $seatNr = $seatNr . '' . strval($y);
                    $model1->plane_nr = $planeNr;
                    if($i < $businessRows){
                        $model1->seat_type = 'Business';
                    }
                    else{
                        $model1->seat_type = 'Economy';
                    }
                    $model1->seat_nr = $seatNr;
                    $model1->save();
                }
            }
            return 'OK';
        }
    }
}
