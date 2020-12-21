<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class EditForm extends Model
{
    public $testname;
    public $name;
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
    
    public $qqq;
    public $aaa;
        
    /*public function ret()
{    
    return ['name'];
            
        
    } */

   public function rules()
    {
        /*
       return [
           [['imageFile'], 'file','skipOnEmpty' => $this->skip, 'extensions' => 'png, jpg'],
             [['lastname','photo', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary', 'specialization', 'city','sex', 'employment', 'shedule', 'aboutme'], 'default', 'value' => null],
           [['employment', 'shedule'], 'default', 'value' => ['Не указано']],
           [['lastname'], 'required', 'message' => 'Поле обязательно для заполнения'],
           
           
        ]; */
        
      return [
           [['imageFile'], 'file','skipOnEmpty' => $this->skip, 'extensions' => 'png, jpg'],
           [['photo','lastname', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary', 'specialization', 'city'], 'required', 'message' => 'Поле обязательно для заполнения'],
           [['employment', 'shedule'], 'default', 'value' => ['Не указано']],
           [['sex', 'aboutme'], 'default', 'value' => null],
           ['email', 'email', 'message' => 'Поле заполнено неверно'],
           ['salary', 'integer', 'min' => '1', 'tooSmall' => 'Поле заполнено неверно', 'message' => 'Поле заполнено неверно'], 
           //['mobile', 'match', 'pattern' => '/^[+7]{1}[+|0-9| |-]*$/i', 'message' => 'Поле заполнено неверно'], 
          // ['mobile', 'match', 'pattern' => '/^[+7][+|0-9]{3}$/i', 'message' => 'Поле заполнено неверно'], 
            ['mobile', 'match', 'pattern' => '/^(\+7)[ |-]?[0-9]{3}[ |-]?[0-9]{3}[ |-]?[0-9]{2}[ |-]?[0-9]{2}$/i', 'message' => 'Поле заполнено неверно'], //пропускает только номера по шаблону +7 123 456 78 90, после 7 только 10 цифр, на месте пробелов так же могут быть тире, либо же пробелов может не быть (слитное написание допускается).
    //  ['birthdate', 'match', 'pattern' => '/^([0-2]{1}[0-9]{1}|[3]{1}[0-1]{1})[.]{1}([0]{1}[0-9]{1}|[1]{1}[0-2]{1})[.]{1}[0-9]{4}$/i', 'message' => 'Поле заполнено неверно'] //валидация даты рождения - отключена, поскольку bootstrap datepicker все равно не даст ввести дату неправильно
        ]; 
    } 
    
   /* public function validatePhone () {
        if (substr($this->mobile, 0, 2)!=="+7"){
            $this->addError('mobile', 'Поле заполнено неверно.');
        }
    }*/
    
    
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