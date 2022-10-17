<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seat".
 *
 * @property int $seat_id
 * @property string $plane_nr
 * @property string $seat_type
 * @property string $seat_nr
 * @property int $is_taken
 *
 * @property Plane $planeNr
 */
class Seat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plane_nr', 'seat_type', 'seat_nr', 'is_taken'], 'required'],
            [['is_taken'], 'integer'],
            [['plane_nr', 'seat_type', 'seat_nr'], 'string', 'max' => 50],
            [['plane_nr'], 'exist', 'skipOnError' => true, 'targetClass' => Plane::class, 'targetAttribute' => ['plane_nr' => 'plane_nr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seat_id' => 'Seat ID',
            'plane_nr' => 'Plane Nr',
            'seat_type' => 'Seat Type',
            'seat_nr' => 'Seat Nr',
            'is_taken' => 'Is Taken',
        ];
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
