<?php

namespace app\controllers\public;

use app\models\Booking;
use app\models\Flight;
use app\models\Bookingflight;
use app\models\Bookingperson;
use app\models\Person;
use Yii;
use yii\helpers\Json;

use PhpParser\Node\Expr\Cast\Bool_;


class PassengerlistcheckinController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
