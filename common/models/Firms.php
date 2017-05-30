<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use common\models\query\FirmsQuery;

/**
 * This is the model class for table "firms".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $title
 * @property string $description
 * @property string $site
 * @property string $tel
 * @property string $info
 * @property string $work_time
 * @property array $category_brands_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $adress
 * @property string $metro
 * @property string $google_maps
 * @property integer $prioritet
 *
 * @property CategoryBrands $categoryBrands
 * @property FirmsCategoryBrands[] $firmsCategoryBrands
 * @property CategoryBrands[] $categoryBrands0
 */
class Firms extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;
    public static $statusLabels = [
        self::STATUS_ACTIVE => 'Видимый',
        self::STATUS_DRAFT => 'Не видимый',
    ];

    public $category_brands_id;

    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'firms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_brands_id','title','description'], 'required'],
            [['info','description'], 'string'],
            [['prioritet','status'], 'integer'],
            [['name', 'tel', 'work_time', 'adress', 'metro','title','site'], 'string', 'max' => 255],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['google_maps'], 'string', 'max' => 1000],
            [['thumbnail'], 'safe']
        ];
    }

    public function getStatusName () {
        self::$statusLabels;
        return isset(self::$statusLabels[$this->status]) ? self::$statusLabels[$this->status]: null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'tel' => Yii::t('common', 'Tel'),
            'info' => Yii::t('common', 'Info'),           
            'category_brands_id' => Yii::t('common', 'Category Brands ID'),
            'thumbnail' => Yii::t('common', 'Thumbnail'),
            'adress' => Yii::t('common', 'Adress'),
            'work_time' => Yii::t('common', 'Work Time'),
            'metro' => Yii::t('common', 'Metro'),
            'prioritet' => Yii::t('common', 'Priority'),
            'google_maps' => Yii::t('common', 'Google Maps'),
            'status' => Yii::t('common', 'Status'),
            'title' => Yii::t('common', 'Titles'),
            'description' => Yii::t('common', 'Description'),
            'site' => Yii::t('common', 'Site'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryBrands()
    {
        return $this->hasOne(CategoryBrands::className(), ['id' => 'category_brands_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirmsCategoryBrands()
    {
        return $this->hasMany(FirmsCategoryBrands::className(), ['firms_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryBrands0()
    {
        return $this->hasMany(CategoryBrands::className(), ['id' => 'category_brands_id'])->viaTable('firms_category_brands', ['firms_id' => 'id']);
    }

    public function getFirms0()
    {
        return $this->hasMany(Firms::className(), ['id' => 'firms_id'])->viaTable('firms_category_brands', ['category_id' => 'category_id','brands_id' => 'brands_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {

        $this->updateCategoryBrands();
        parent::afterSave($insert, $changedAttributes);
    }
    private function updateCategoryBrands()
    {
        $search = FirmsCategoryBrands::findOne($this->id);
        if($search){
            FirmsCategoryBrands::deleteAll(['firms_id'=>$this->id]);
        }
        foreach($this->category_brands_id as $value){
            $new = new FirmsCategoryBrands;
            $new->firms_id = $this->id;
            $qwe = explode ('-',$value);
            $category_id = $qwe[0];
            $brand_id = $qwe[1];
            $new->category_id = $category_id;
            $new->brand_id = $brand_id;

            $new->save();
        }
    }


    /**
     * @inheritdoc
     * @return \common\models\query\FirmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FirmsQuery(get_called_class());
    }
}
