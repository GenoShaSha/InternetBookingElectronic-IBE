<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "plane_seat".
 *
 * @property int $id
 * @property int $seat_id
 * @property int $person_id
 * @property int $flight_id
 * @property Person $person
 * @property Seat $seat
 */
class PlaneSeat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plane_seat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seat_id', 'person_id', 'flight_id'], 'required'],
            [['seat_id', 'person_id', 'flight_id'], 'integer'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::class, 'targetAttribute' => ['person_id' => 'person_id']],
            [['seat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seat::class, 'targetAttribute' => ['seat_id' => 'seat_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seat_id' => 'Seat ID',
            'person_id' => 'Person ID',
            'flight_id' => 'Flight ID',
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

    /**
     * Gets query for [[Seat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeat()
    {
        return $this->hasOne(Seat::class, ['seat_id' => 'seat_id']);
    }

    public static function findAllByFlightId($flight_id)
    {
        $planeSeat = PlaneSeat::findAll(['flight_id' => $flight_id]);
        return $planeSeat;
    }
}
