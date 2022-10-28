<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $nationality
 * @property string $personal_doc_type
 * @property string $personal_doc_num
 *
 * @property BookingPerson[] $bookingPeople
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth', 'gender', 'nationality', 'personal_doc_type', 'personal_doc_num'], 'required'],
            [['first_name', 'last_name', 'date_of_birth'], 'string', 'max' => 255],
            [['gender', 'nationality', 'personal_doc_type', 'personal_doc_num'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'nationality' => 'Nationality',
            'personal_doc_type' => 'Personal Doc Type',
            'personal_doc_num' => 'Personal Doc Num',
        ];
    }

    /**
     * Gets query for [[BookingPeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingPeople()
    {
        return $this->hasMany(BookingPerson::class, ['person_id' => 'person_id']);
    }
}
