<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Metro]].
 *
 * @see Metro
 */
class MetroQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Metro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Metro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
