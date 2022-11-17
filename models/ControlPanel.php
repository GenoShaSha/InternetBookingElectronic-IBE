<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control_panel".
 *
 * @property int $id
 * @property string $icon_img
 * @property string $navbar_color
 * @property string $background_img
 * @property string $font_color
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
            [['icon_img', 'navbar_color', 'background_img', 'font_color'], 'required'],
            [['icon_img', 'navbar_color', 'background_img', 'font_color'], 'string', 'max' => 255],
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
            'navbar_color' => 'Navbar Color',
            'background_img' => 'Background Img',
            'font_color' => 'Font Color',
        ];
    }

    public static function findObjectById($id)
    {
        $data = ControlPanel::findOne(['id' => $id]);
        return $data;
    }

}
