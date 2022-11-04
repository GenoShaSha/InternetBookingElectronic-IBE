<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $booking_id
 * @property int|null $user_id
 * @property string $booking_nr
 * @property string $email
 * @property string $seat_types
 *
 * @property BookingFlight[] $bookingFlights
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['booking_nr', 'email', 'seat_types'], 'required'],
            [['booking_nr', 'email'], 'string', 'max' => 50],
            [['seat_types'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'Booking ID',
            'user_id' => 'User ID',
            'booking_nr' => 'Booking Nr',
            'email' => 'Email',
            'seat_types' => 'Seat Types',
        ];
    }

    /**
     * Gets query for [[BookingFlights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingFlights()
    {
        return $this->hasMany(BookingFlight::class, ['booking_id' => 'booking_id']);
    }

             /**
     * Finds user by username
     *
     * @param string $email
     * @param string $bookingNr
     * @return static|null
     */
    public static function findBookingByNrAndEmail($email,$bookingNr)
    {
        return self::findOne(['email' => $email, 'booking_nr' => $bookingNr]);
    }

}
