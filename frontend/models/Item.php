<?php
//Created By SoeltanASF
namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $price
 * @property int|null $category_id
 *
 * @property ItemCategory $category
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ItemCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ItemCategory::class, ['id' => 'category_id']);
    }

    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::class,
            \yii\behaviors\BlameableBehavior::class
        ];
    }
}
