<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ItemImage extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'gif, jpg, jpeg, png']
        ];
    }
}
