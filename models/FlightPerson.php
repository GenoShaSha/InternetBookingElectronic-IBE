<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight_person".
 *
 * @property int $flight_person_id
 * @property int $flight_id
 * @property int $person_id
 * @property int $check_in
 *
 * @property BookingFlight $flight
 * @property BookingPerson $person
 */
class FlightPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flight_id', 'person_id', 'check_in'], 'required'],
            [['flight_id', 'person_id', 'check_in'], 'integer'],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookingFlight::class, 'targetAttribute' => ['flight_id' => 'flight_id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookingPerson::class, 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flight_person_id' => 'Flight Person ID',
            'flight_id' => 'Flight ID',
            'person_id' => 'Person ID',
            'check_in' => 'Check In',
        ];
    }

    /**
     * Gets query for [[Flight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(BookingFlight::class, ['flight_id' => 'flight_id']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(BookingPerson::class, ['person_id' => 'person_id']);
    }

    public static function findByFlightIdAndPersonId($fligtId, $personId)
    {
        return self::findOne(['flight_id' => $fligtId, 'person_id' => $personId]);

    }
}
