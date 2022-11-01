<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking_flight".
 *
 * @property int $id
 * @property int $booking_id
 * @property int $flight_id
 *
 * @property Booking $booking
 * @property Flight $flight
 */
class Bookingflight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking_flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id', 'flight_id'], 'required'],
            [['booking_id', 'flight_id'], 'integer'],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::class, 'targetAttribute' => ['booking_id' => 'booking_id']],
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
            'booking_id' => 'Booking ID',
            'flight_id' => 'Flight ID',
        ];
    }

    /**
     * Gets query for [[Booking]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Booking::class, ['booking_id' => 'booking_id']);
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

    public static function getByBookingId($booking_id)
    {
        $bookingFlight = Bookingflight::findAll(['booking_id' => $booking_id]);
        return $bookingFlight;
    }
}
