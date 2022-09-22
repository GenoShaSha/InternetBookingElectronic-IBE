<?php

namespace app\controllers;
use Yii;
use app\models\person;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSave(){
        $model = new person();
        if(Yii::$app->request->isAjax){
            $data = Yii::$app->request->post();
            $model->first_name = $data['last_name'];
            $model->last_name = $data['last_name'];
            $model->date_of_birth = $data['date_of_birth'];
            $model->gender = $data['gender'];
            $model->nationality = $data['nationality'];
            $model->personal_doc_type = $data['personal_doc_type'];
            $model->personal_doc_num = $data['personal_doc_num'];
                $model->save();
                return "OK";    
            
        }
        else {
            return 'error';
        }
    }
}
