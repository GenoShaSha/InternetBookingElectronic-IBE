<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seat_availability_flight".
 *
 * @property int $id
 * @property int $flight_id
 * @property int $available_economy_seats
 * @property int $available_business_seats
 *
 * @property Flight $flight
 */
class SeatAvailabilityFlight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seat_availability_flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flight_id', 'available_economy_seats', 'available_business_seats'], 'required'],
            [['flight_id', 'available_economy_seats', 'available_business_seats'], 'integer'],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::class, 'targetAttribute' => ['flight_id' => 'flight_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flight_id' => 'Flight ID',
            'available_economy_seats' => 'Available Economy Seats',
            'available_business_seats' => 'Available Business Seats',
        ];
    }

    /**
     * Gets query for [[Flight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flight::class, ['flight_id' => 'flight_id']);
    }

    
    public static function getByFlightID($id)
    {
        $seatAvailability = SeatAvailabilityFlight::findOne(['flight_id' => $id]);
        return $seatAvailability;
    }

}
