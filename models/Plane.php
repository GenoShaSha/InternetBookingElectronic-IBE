<?php

namespace app\models;
use yii\helpers\Json;

use Yii;

/**
 * This is the model class for table "plane".
 *
 * @property string $plane_nr
 * @property string $plane_name
 * @property int $seat_columns
 * @property int $seat_rows
 * @property int $seat_rows_business
 *
 * @property Flight[] $flights
 * @property Seat[] $seats
 */
class Plane extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plane';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plane_nr', 'plane_name', 'seat_columns', 'seat_rows', 'seat_rows_business'], 'required'],
            [['seat_columns', 'seat_rows', 'seat_rows_business'], 'integer'],
            [['plane_nr'], 'string', 'max' => 50],
            [['plane_name'], 'string', 'max' => 100],
            [['plane_nr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plane_nr' => 'Plane Nr',
            'plane_name' => 'Plane Name',
            'seat_columns' => 'Seat Columns',
            'seat_rows' => 'Seat Rows',
            'seat_rows_business' => 'Seat Rows Business',
        ];
    }

    /**
     * Gets query for [[Flights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::class, ['plane_nr' => 'plane_nr']);
    }

    /**
     * Gets query for [[Seats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeats()
    {
        return $this->hasMany(Seat::class, ['plane_nr' => 'plane_nr']);
    }

    public static function findAllPlaneNumbers()
    {
        $planeNrs = Plane::find()->select('plane_nr')->column();
        $data = JSON::encode($planeNrs);
        return $data;
    }

    public static function findAllPlane()
    {
        $planes = Plane::find()->all();
        $data = JSON::encode($planes);
        return $data;
    }
    
    public static function findByPlaneNr($plane_nr)
    {
        $plane = Plane::findOne(['plane_nr' => $plane_nr]);
        $data = JSON::encode($plane);
        return $data;
    }
    
    public static function findObjectByPlaneNr($plane_nr)
    {
        $plane = Plane::findOne(['plane_nr' => $plane_nr]);
        return $plane;
    }
}
