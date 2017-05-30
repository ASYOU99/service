<?php

namespace common\models;

use common\models\query\MainCategoryQuery;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "main_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $status
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 *
 * @property Category[] $categories
 */
class MainCategory extends ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;

    public static $statusLabels = [
        self::STATUS_ACTIVE => 'Видимый',
        self::STATUS_DRAFT => 'Не видимый',
    ];


    /**
     * @var array
     */
    public $thumbnail;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
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
            'slug' => Yii::t('common', 'Slug'),
            'status' => Yii::t('common', 'Status'),
            'thumbnail' => Yii::t('common', 'Thumbnail'),
        ];
    }

    /**
     * @return MainCategoryQuery
     */
    public static function find()
    {
        return new MainCategoryQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            //TimestampBehavior::className(),
           [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
               'ensureUnique' => true,

           ],
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
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['main_category_id' => 'id']);
    }
}
