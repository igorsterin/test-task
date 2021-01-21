<?php


namespace app\models;


use yii\base\Model;

class Image extends Model
{
    public $imageFile;
    public $skip;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => $this->skip, 'extensions' => 'png, jpg'],

        ];
    }
    public function upload()
    {
        if ($this->validate() and $this->imageFile !== null) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}