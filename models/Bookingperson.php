<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking_person".
 *
 * @property int $id
 * @property int|null $person_id
 * @property int|null $booking_id
 *
 * @property Person $person
 */
class Bookingperson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'booking_id'], 'integer'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::class, 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'booking_id' => 'Booking ID',
        ];
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::class, ['person_id' => 'person_id']);
    }
    public static function getByBookingId($booking_id)
    {
        $bookingFlight = Bookingperson::findAll(['booking_id' => $booking_id]);
        return $bookingFlight;
    }
}
