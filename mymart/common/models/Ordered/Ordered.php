<?php

namespace common\models\Ordered;

use Yii;
use common\models\Customer\Customer;

/**
 * This is the model class for table "ordered".
 *
 * @property integer $id
 * @property string $date
 * @property integer $customer_id
 *
 * @property Customer $customer
 * @property OrderedItem $orderedItem
 */
class Ordered extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordered';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'customer_id'], 'required'],
            [['date'], 'safe'],
            [['customer_id'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderedItem()
    {
        return $this->hasOne(OrderedItem::className(), ['ordered_id' => 'id']);
    }
}
