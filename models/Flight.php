<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "flight".
 *
 * @property int $flight_id
 * @property string $flight_nr
 * @property string $from
 * @property string $to
 * @property string $arrival_terminal
 * @property string $arrival_date
 * @property string $departure_terminal
 * @property string $departure_date
 * @property float $economy_price
 * @property float $business_price
 *
 * @property BookingFlight[] $bookingFlights
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
            [['flight_nr', 'from', 'to', 'arrival_terminal', 'arrival_date', 'departure_terminal', 'departure_date', 'economy_price', 'business_price'], 'required'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['economy_price', 'business_price'], 'number'],
            [['flight_nr'], 'string', 'max' => 45],
            [['from', 'to'], 'string', 'max' => 255],
            [['arrival_terminal', 'departure_terminal'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flight_id' => 'Flight ID',
            'flight_nr' => 'Flight Nr',
            'from' => 'From',
            'to' => 'To',
            'arrival_terminal' => 'Arrival Terminal',
            'arrival_date' => 'Arrival Date',
            'departure_terminal' => 'Departure Terminal',
            'departure_date' => 'Departure Date',
            'economy_price' => 'Economy Price',
            'business_price' => 'Business Price',
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

    public static function findAllFlights()
    {
        $flights = Flight::find()->all();
        $data = JSON::encode($flights);
        return $data;
    }

    public static function findByFlightId($flight_id)
    {
        $flight = Flight::findOne(['flight_id' => $flight_id]);
        $data = JSON::encode($flight);
        return $data;
    }

    
    public static function findObjectByFlightId($flight_id)
    {
        $flight = Flight::findOne(['flight_id' => $flight_id]);
        return $flight;
    }
    
    public static function findByFlightNr($flight_nr)
    {
        $flight = Flight::findOne(['flight_nr' => $flight_nr]);
        $data = JSON::encode($flight);
        return $data;
    }
    public static function findFlightByDepartureDate($departure_date)
    {
        $flight = Flight::findOne(['departure_date' => $departure_date]);
        $data = JSON::encode($flight);
        return $data;
    }

}
