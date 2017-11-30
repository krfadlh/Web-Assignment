<?php

namespace common\models\Item;

use Yii;
//use common\models\ItemCategory;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $price
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property OrderedItem[] $orderedItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $file1;
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
            [['nama', 'category_id'], 'required'],
            [['price', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama'], 'string', 'max' => 255],
			[['file1'],'file','extensions' => 'gif, png, jpg'],
			[['photo'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
	 
	public function behaviors(){
		return [
			[
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => 'updated_by',
			],
			'timestamp' => [
				'class' => 'yii\behaviors\TimeStampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT =>['created_at','updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE =>['updated_at'],
				],
			],
		];
		
	}
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'price' => 'Price',
            'category_id' => 'Category ID',
			'photo' => 'Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
	
	public function beforeSave($insert){
		if(parent::beforeSave($insert)){
			if(Yii::$app->request->isPost){
				$this->file1=UploadedFile::getInstance($this,'file1');
				if($this->file1&&$this->validate()){
					$this->file1->saveAs('uploads/'.$this->file1->basename.
					'.'.$this->file1->extension);
					
					$this->photo = 'uploads/'.$this->file1->basename.
					'.'.$this->file1->extension;
					return true;
				}
			}
		}
			else{
				return false;
			}
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderedItems()
    {
        return $this->hasMany(OrderedItem::className(), ['item_id' => 'id']);
    }
}
