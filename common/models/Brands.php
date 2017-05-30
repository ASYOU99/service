<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\query\BrandsQuery;
/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property CategoryBrands[] $categoryBrands
 * @property FirmsCategoryBrands[] $firmsCategoryBrands
 */
class Brands extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name','title','description'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'status' => Yii::t('common', 'Status'),
            'title' => Yii::t('common', 'Titles'),
            'description' => Yii::t('common', 'Description'),
        ];
    }


    public function getCategory()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('category_brands', ['brands_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryBrands()
    {
        return $this->hasMany(CategoryBrands::className(), ['brands_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmsCategoryBrands()
    {
        return $this->hasMany(FirmsCategoryBrands::className(), ['brand_id' => 'id']);
    }


    /**
     * @inheritdoc
     * @return \common\models\query\BrandsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BrandsQuery(get_called_class());
    }
}
