<?php

namespace common\models;

use common\models\query\CategoryBrandsQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category_brands".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $brands_id
 * @property string $title
 * @property string $description
 *
 * @property Brands $brands
 * @property Category $category
 */
class CategoryBrands extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'brands_id','title','description'], 'required'],
            [['category_id', 'brands_id'], 'integer'],
            [['category_id', 'brands_id'], 'unique', 'targetAttribute' => ['category_id', 'brands_id']],
            [['title','description'], 'string', 'max' => 255],
            [['brands_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brands_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'category_id' => Yii::t('common', 'Category ID'),
            'brands_id' => Yii::t('common', 'Brands ID'),
            'title' => Yii::t('common', 'Titles'),
            'description' => Yii::t('common', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brands_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CategoryBrandsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryBrandsQuery(get_called_class());
    }
}
