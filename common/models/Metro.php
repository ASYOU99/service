<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 */
class Metro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['color'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'color' => Yii::t('common', 'Color'),
        ];
    }

    /**
     * @inheritdoc
     * @return MetroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetroQuery(get_called_class());
    }
}
