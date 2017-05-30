<?php

namespace common\models;

use common\models\query\ModelsQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "models".
 *
 * @property string $id
 * @property integer $id_category
 * @property integer $id_brands
 * @property string $tovar
 *
 * @property Brands $idBrands
 * @property Category $idCategory
 */
class Models extends ActiveRecord
{
    //public $tovar;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'id_brands', 'tovar'], 'required'],
            [['id_category', 'id_brands'], 'integer'],
            [['tovar'], 'string'],
            [['id_brands'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['id_brands' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'id_category' => Yii::t('common', 'Id Category'),
            'id_brands' => Yii::t('common', 'Id Brands'),
            'tovar' => Yii::t('common', 'tovar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'id_brands']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

//    public function afterSave($insert, $changedAttributes)
//    {
//
//        $this->parseModels();
//        parent::afterSave($insert, $changedAttributes);
//    }

//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            //$this->parseModels();
//            $this->tovar = explode(PHP_EOL,$this->tovar);
//            return true;
//        } else {
//            return false;
//        }
//    }
//    private function parseModels()
//    {
//        $test = explode(PHP_EOL,$this->tovar);
//        foreach ($test as $value) {
//            $new = new Models;
//            $new->id = $this->id;
//            $new->id_category = $this->id_category;
//            $new->id_brands = $this->id_brands;
//            $this->tovar = $value;
            //$this->save();
//        }
//    }


        /**
     * @inheritdoc
     * @return \common\models\query\ModelsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ModelsQuery(get_called_class());
    }
}
