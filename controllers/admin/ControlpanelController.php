<?php

namespace app\controllers\admin;
use app\models\ControlPanel;
use Yii;

class ControlpanelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            $model->navbar_color = $data['navbar_color'];
            $model->update();
        }
    }

}
