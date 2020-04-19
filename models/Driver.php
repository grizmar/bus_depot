<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $birthday
 * @property int $bus
 *
 * @property Bus $bus0
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
            'full_name' => 'Full Name',
            'birthday' => 'Birthday',
            'bus' => 'Bus',
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
