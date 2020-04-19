<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $id
 * @property string $name
 * @property int $speed
 *
 * @property Driver[] $drivers
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'speed'], 'required'],
            [['speed'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'speed' => 'Средняя скорость',
        ];
    }

    /**
     * Gets query for [[Drivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Driver::className(), ['bus' => 'id']);
    }
}