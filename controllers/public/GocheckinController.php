<?php

namespace app\controllers\public;

use app\models\Booking;
use app\models\Flight;
use app\models\Bookingflight;
use app\models\Bookingperson;
use app\models\FlightPerson;
use app\models\Seat;
use app\models\Person;
use app\models\Plane;
use app\models\PlaneSeat;
use Yii;
use yii\helpers\Json;



class GocheckinController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSearch()
    {
        $model = new Booking();
        $data = Yii::$app->request->post();
        $email = $data['email'];
        $bookingNr = $data['bookingNr'];
        $foundTrip = $model->findBookingByNrAndEmail($email, $bookingNr);

        $model2 = new Bookingflight();
        $foundConnectionFlightBookingList = $model2->getByBookingId($foundTrip->booking_id);
        $FlightsArray = [];
        $SeatsArray = [];
        $PlaneArray = [];
        $TakenSeatArray = [];
        for ($i = 0; $i < count($foundConnectionFlightBookingList); $i++) {
            $flight = new Flight();
            $seat = new Seat();
            $takenSeat = new PlaneSeat();
            $plane = new Plane();

            $foundFlight = $flight->findObjectByFlightId($foundConnectionFlightBookingList[$i]->flight_id);
            $seats = $seat->getByPlaneNr($foundFlight->plane_nr);
            $planes = $plane->findObjectByPlaneNr($foundFlight->plane_nr);
            $takenSeats = $takenSeat->findAllByFlightId($foundFlight->flight_id);
            array_push($FlightsArray, $foundFlight);
            array_push($TakenSeatArray, $takenSeats);
            array_push($SeatsArray, $seats);
            array_push($PlaneArray, $planes);
        }

        $model3 = new Bookingperson();
        $foundPassengerBookingList = $model3->getByBookingId($foundTrip->booking_id);
        $PassangersArray = [];
        $PassangersCheckin = [];
        for ($i = 0; $i < count($foundPassengerBookingList); $i++) {
            for ($b = 0; $b < count($foundConnectionFlightBookingList); $b++) {
                $flightPerson = new FlightPerson();
                $personCheckedin = $flightPerson->findByFlightIdAndPersonId($foundConnectionFlightBookingList[$b]->flight_id, $foundPassengerBookingList[$i]->person_id);
                array_push($PassangersCheckin, $personCheckedin);
            }
            $person = new Person();
            $foundPassengers = $person->getPassengerByID($foundPassengerBookingList[$i]->person_id);
            array_push($PassangersArray, $foundPassengers);
        }

        $AllBookingInformation = [];
        array_push($AllBookingInformation, $foundTrip, $FlightsArray, $PassangersArray, $SeatsArray, $PlaneArray, $TakenSeatArray, $PassangersCheckin);
        $data = JSON::encode($AllBookingInformation);
        return $data;
    }
}
