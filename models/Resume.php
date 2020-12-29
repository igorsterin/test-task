<?php

namespace app\models;


//use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


class Resume extends ActiveRecord
{
     //public $testname;
 /*   public $name;
    public $email;
    public $lastname;
    public $middlename;
    public $birthdate;
    public $city;
    public $mobile;
    public $sex;
    public $salary;
    public $employment;
    public $shedule;
    public $aboutme;
    public $photo;
    public $specialization;
    public $imageFile;
    public $skip;
  */  
    public $imageFile;
    public $skip;
    
    /**
    * @property public $imagefile
    * @param boolean $skip
    */

   public function rules()
    {
      
       return [
           [['imageFile'], 'file','skipOnEmpty' => $this->skip, 'extensions' => 'png, jpg'],
         // [['imageFile'], 'default', 'value' => 'testimg'],
           [['lastname','photo', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary', 'specialization', 'city','sex','aboutme'], 'default', 'value' => null],
           [['employment', 'shedule'], 'default', 'value' => ['Не указано']],
           [['lastname'], 'required', 'message' => 'Поле обязательно для заполнения']
           ];
   
        
   /*   return [
           [['imageFile'], 'file','skipOnEmpty' => $this->skip, 'extensions' => 'png, jpg'],
           [['photo','lastname', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary', 'specialization', 'city'], 'required', 'message' => 'Поле обязательно для заполнения'],
           [['employment', 'shedule'], 'default', 'value' => ['Не указано']],
           [['sex', 'aboutme'], 'default', 'value' => null],
           ['email', 'email', 'message' => 'Поле заполнено неверно'],
           ['salary', 'integer', 'min' => '1', 'tooSmall' => 'Поле заполнено неверно', 'message' => 'Поле заполнено неверно'], 
      
            ['mobile', 'match', 'pattern' => '/^(\+7)[ |-]?[0-9]{3}[ |-]?[0-9]{3}[ |-]?[0-9]{2}[ |-]?[0-9]{2}$/i', 'message' => 'Поле заполнено неверно'], //пропускает только номера по шаблону +7 123 456 78 90, после 7 только 10 цифр, на месте пробелов так же могут быть тире, либо же пробелов может не быть (слитное написание допускается).
   
        ]; */
    } 
 
      
      //public $imageFile;
    
      public function upload()
    {
        if ($this->validate() and $this->imageFile!==null) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}




?>