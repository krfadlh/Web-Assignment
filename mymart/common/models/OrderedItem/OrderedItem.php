<?php

namespace common\models\OrderedItem;

use Yii;
use common\models\Ordered\Ordered;
use common\models\Item\Item;

/**
 * This is the model class for table "ordered_item".
 *
 * @property integer $ordered_id
 * @property integer $item_id
 *
 * @property Ordered $ordered
 * @property Item $item
 */
class OrderedItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordered_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'required'],
            [['item_id'], 'integer'],
            [['ordered_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordered::className(), 'targetAttribute' => ['ordered_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ordered_id' => 'Ordered ID',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdered()
    {
        return $this->hasOne(Ordered::className(), ['id' => 'ordered_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}
