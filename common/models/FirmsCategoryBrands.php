<?php

namespace common\models;

use common\models\query\FirmsCategoryBrandsQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "firms_category_brands".
 *
 * @property integer $firms_id
 * @property integer $category_id
 * @property integer $brand_id
 *
 * @property Brands $brand
 * @property Category $category
 * @property Firms $firms
 */
class FirmsCategoryBrands extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firms_category_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firms_id', 'category_id', 'brand_id'], 'required'],
            [['firms_id', 'category_id', 'brand_id'], 'integer'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['firms_id'], 'exist', 'skipOnError' => true, 'targetClass' => Firms::className(), 'targetAttribute' => ['firms_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firms_id' => Yii::t('common', 'Firms ID'),
            'category_id' => Yii::t('common', 'Category ID'),
            'brand_id' => Yii::t('common', 'Brand ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirms()
    {
        return $this->hasOne(Firms::className(), ['id' => 'firms_id']);
    }

    public function getGroupOrderFirms()
    {
        return $this->getFirms()
            ->orderBy(['prioritet' => SORT_DESC]);
    }


    /**
     * @inheritdoc
     * @return \common\models\query\FirmsCategoryBrandsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FirmsCategoryBrandsQuery(get_called_class());
    }
}
