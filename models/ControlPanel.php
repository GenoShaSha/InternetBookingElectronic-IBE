<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control_panel".
 *
 * @property int $id
 * @property string $icon_img
 * @property string $primary_background_color
 * @property string $navbar_color
 * @property string $background_img
 */
class ControlPanel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'control_panel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon_img', 'primary_background_color', 'navbar_color', 'background_img'], 'required'],
            [['icon_img', 'primary_background_color', 'navbar_color', 'background_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon_img' => 'Icon Img',
            'primary_background_color' => 'Primary Background Color',
            'navbar_color' => 'Navbar Color',
            'background_img' => 'Background Img',
        ];
    }
    
    public static function findObjectById($id)
    {
        $data = ControlPanel::findOne(['id' => $id]);
        return $data;
    }
}
