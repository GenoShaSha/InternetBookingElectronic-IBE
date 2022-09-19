<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Booking[] $bookings
 * @property Person[] $people
 */
class user extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'auth_key', 'access_token'], 'required'],
            [['username', 'password'], 'string', 'max' => 50],
            [['email', 'auth_key', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::class, ['user_id' => 'user_id']);
    }
}
