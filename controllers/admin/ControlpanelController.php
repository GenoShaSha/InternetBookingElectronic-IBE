<?php

namespace app\controllers\admin;

class ControlpanelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
