<?php

namespace app\controllers\admin;
use app\models\ControlPanel;
use yii\helpers\Json;
use Yii;

class ControlpanelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetcolors()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            return JSON::encode($model);
        }
    }

    public function actionUpdatenavcolor()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            $model->navbar_color = $data['navbar_color'];
            $model->update();
            return JSON::encode($model);
        }
    }

    public function actionUpdatefontcolor()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            $model->font_color = $data['font_color'];
            $model->update();
            return JSON::encode($model);
        }
    }

    public function actionUpdatebgimg()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            $model->background_img = $data['background_img'];
            $model->update();
            return JSON::encode($model);
        }
    }

    public function actionUpdatelogo()
    {
        $model = new ControlPanel();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = $model->findObjectById(1);
            $model->icon_img = $data['icon_img'];
            $model->update();
            return JSON::encode($model);
        }
    }

}
