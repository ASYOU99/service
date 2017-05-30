<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\MainCategory;
use yii\db\ActiveQuery;

class MainCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => MainCategory::STATUS_ACTIVE]);

        return $this;
    }
}
