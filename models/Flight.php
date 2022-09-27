<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property int $flight_id
 * @property int $plane_id
 * @property string $flight_nr
 * @property string $from
 * @property string $to
 * @property string $arrival_terminal
 * @property string $arrival_date
 * @property string $departure_terminal
 * @property string $departure_date
 * @property int $child_flight
 * @property int $transit
 *
 * @property BookingFlight[] $bookingFlights
 * @property Flight $childFlight
 * @property Flight[] $flights
 * @property Plane $plane
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plane_id', 'flight_nr', 'from', 'to', 'arrival_terminal', 'arrival_date', 'departure_terminal', 'departure_date', 'child_flight', 'transit'], 'required'],
            [['plane_id', 'child_flight', 'transit'], 'integer'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['flight_nr'], 'string', 'max' => 45],
            [['from', 'to'], 'string', 'max' => 255],
            [['arrival_terminal', 'departure_terminal'], 'string', 'max' => 50],
            [['child_flight'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::class, 'targetAttribute' => ['child_flight' => 'flight_id']],
            [['plane_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plane::class, 'targetAttribute' => ['plane_id' => 'plane_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flight_id' => 'Flight ID',
            'plane_id' => 'Plane ID',
            'flight_nr' => 'Flight Nr',
            'from' => 'From',
            'to' => 'To',
            'arrival_terminal' => 'Arrival Terminal',
            'arrival_date' => 'Arrival Date',
            'departure_terminal' => 'Departure Terminal',
            'departure_date' => 'Departure Date',
            'child_flight' => 'Child Flight',
            'transit' => 'Transit',
        ];
    }

    /**
     * Gets query for [[BookingFlights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingFlights()
    {
        return $this->hasMany(BookingFlight::class, ['flight_id' => 'flight_id']);
    }

    /**
     * Gets query for [[ChildFlight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildFlight()
    {
        return $this->hasOne(Flight::class, ['flight_id' => 'child_flight']);
    }

    /**
     * Gets query for [[Flights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::class, ['child_flight' => 'flight_id']);
    }

    /**
     * Gets query for [[Plane]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlane()
    {
        return $this->hasOne(Plane::class, ['plane_id' => 'plane_id']);
    }
}
