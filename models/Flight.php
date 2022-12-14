<?php

namespace app\models;

use yii\helpers\Json;
use app\models\SeatAvailabilityFlight;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property int $flight_id
 * @property string $plane_nr
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
 * @property Plane $planeNr
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
            [['plane_nr', 'from', 'to', 'arrival_terminal', 'arrival_date', 'departure_terminal', 'departure_date', 'economy_price', 'business_price'], 'required'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['economy_price', 'business_price'], 'number'],
            [['plane_nr'], 'string', 'max' => 45],
            [['from', 'to'], 'string', 'max' => 255],
            [['arrival_terminal', 'departure_terminal'], 'string', 'max' => 50],
            [['plane_nr'], 'exist', 'skipOnError' => true, 'targetClass' => Plane::class, 'targetAttribute' => ['plane_nr' => 'plane_nr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flight_id' => 'Flight ID',
            'plane_nr' => 'Plane Nr',
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

    public static function findAllFlights()
    {
        $flights = Flight::find()->all();
        $data = JSON::encode($flights);
        return $data;
    }

    public static function findSpecificFlights($from, $to, $departure_date, $seatClass, $passengers)
    {
        $flights = Flight::find()
            ->select('flight.*')
            ->innerJoin('seat_availability_flight')
            ->where(['flight.from' => $from])
            ->andWhere(['flight.to' => $to])
            ->andFilterWhere(['>=', 'seat_availability_flight.available_' . $seatClass . '_seats', 1])
            ->andWhere(['like', 'flight.departure_date', '%' . $departure_date . '%', false])
            ->all();
        return $flights;
    }

    public static function findAllFrom()
    {
        $from = Flight::find()->select('from')->distinct()->column();
        $data = JSON::encode($from);
        return $data;
    }
    public static function findAllTo()
    {
        $to = Flight::find()->select('to')->distinct()->column();
        $data = JSON::encode($to);
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
     * Gets query for [[PlaneNr]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaneNr()
    {
        return $this->hasOne(Plane::class, ['plane_nr' => 'plane_nr']);
    }
}
