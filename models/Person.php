<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $nationality
 * @property string $personal_doc_type
 * @property string $personal_doc_num
 *
 * @property User $user
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
            [['person_id', 'user_id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'nationality', 'personal_doc_type', 'personal_doc_num'], 'required'],
            [['person_id', 'user_id'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['gender', 'nationality', 'personal_doc_type', 'personal_doc_num'], 'string', 'max' => 50],
            [['person_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'user_id' => 'User ID',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }
}
