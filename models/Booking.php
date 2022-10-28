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
            [['booking_nr', 'email'], 'required'],
            [['booking_nr', 'email'], 'string', 'max' => 50],
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
        ];
    }
}
