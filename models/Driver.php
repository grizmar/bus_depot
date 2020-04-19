<?php

namespace app\models;

use Yii;

/**
 * Модель для списка водителей
 *
 * @property int $id
 * @property string|null $full_name ФИО
 * @property string|null $birthday дата рождения
 * @property int $bus идентификатор автобуса, которым может управлять водитель
 *
 * @property Bus $bus0 автобус, которым может управлять водитель
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['bus'], 'required'],
            [['bus'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
            [['bus'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'ФИО',
            'birthday' => 'Дата рождения',
            'bus' => 'Автобус',
        ];
    }

    /**
     * Gets query for [[Bus0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus0()
    {
        return $this->hasOne(Bus::className(), ['id' => 'bus']);
    }
}
