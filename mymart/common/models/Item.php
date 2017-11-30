<?php

namespace common\models;

use Yii;
use common\models\ItemCategory;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $parent_category
 *
 * @property ItemCategory[] $itemCategories
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'parent_category'], 'required'],
            [['parent_category','created_at','updated_at','created_by','updated_by'],'integer'],
            [['nama'], 'string', 'max' => 255],
			[['parent_category', 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::className(),
			'targetAttribute' => ['parent_category' => 'id']]
        ]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'parent_category' => 'Parent Category',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategories()
    {
        return $this->hasMany(ItemCategory::className(), ['category_id' => 'id']);
    }
	
	public function behaviors(){
		return[
			[
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => 'updated_by',
			],
			
			'timestamp' => [
				'class' => 'yii\behaviours\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at' , 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
			],
		];
	}
}
