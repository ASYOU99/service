<?php

namespace common\models\query;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Models]].
 *
 * @see \common\models\Models
 */
class ModelsQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Models[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Models|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
