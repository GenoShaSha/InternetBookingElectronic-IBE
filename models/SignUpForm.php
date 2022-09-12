<?php

namespace app\models;

use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $password;
    public $repeatPassword;

    public function rules(){
        return [
            [['username','password','repeatPassword'],'required'],
            [['username'],'string','min'=>5,'max'=>20],
            [['password','repeatPassword'],'string','min'=>10],
            ['repeatPassword','compare','compareAttribute'=>'password']
        ];
    }
}