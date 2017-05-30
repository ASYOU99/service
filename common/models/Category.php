<?php

namespace common\models;

use common\models\query\CategoryQuery;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $main_category_id
 * @property string $slug
 * @property string $name_morphy
 * @property integer $status
 *
 * @property MainCategory $mainCategory
 * @property CategoryBrands[] $categoryBrands
 * @property CategoryService[] $categoryServices
 * @property Service[] $services
 * @property FirmsCategoryBrands[] $firmsCategoryBrands
 * @property Models[] $models
 */
class Category extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;


    public static $statusLabels = [
        self::STATUS_ACTIVE => 'Видимый',
        self::STATUS_DRAFT => 'Не видимый',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_category_id','status'], 'integer'],
            [['name','name_morphy','title','description','main_category_id'], 'required'],
            [['name', 'slug','name_morphy','title','description'], 'string', 'max' => 255],
            [['main_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainCategory::className(), 'targetAttribute' => ['main_category_id' => 'id']],
        ];
    }

    public function getStatusName () {
        self::$statusLabels;
        return isset(self::$statusLabels[$this->status])? self::$statusLabels[$this->status]: null;
    }
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
            ],
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
            'main_category_id' => Yii::t('common', 'Main Category ID'),
            'slug' => Yii::t('common', 'Slug'),
            'status' => Yii::t('common', 'Status'),
            'title' => Yii::t('common', 'Titles'),
            'description' => Yii::t('common', 'Description'),
            'name_morphy' => Yii::t('common', 'Morphological name'),
        ];
    }

    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainCategory()
    {
        return $this->hasOne(MainCategory::className(), ['id' => 'main_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryBrands()
    {
        return $this->hasMany(CategoryBrands::className(), ['category_id' => 'id']);
    }

    public function getBrands()
    {
        return $this->hasMany(Brands::className(), ['id' => 'brands_id'])->viaTable('category_brands', ['category_id' => 'id'])->orderBy('name ASC');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryServices()
    {
        return $this->hasMany(CategoryService::className(), ['category_id' => 'id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['id' => 'service_id'])
            ->viaTable('category_service', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmsCategoryBrands()
    {
        return $this->hasMany(FirmsCategoryBrands::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Models::className(), ['id_category' => 'id']);
    }
}

