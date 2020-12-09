<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class EditForm extends Model
{
    public $testname;
    public $name;
    public $email;
    public $lastname;
    public $middlename;
    public $birthdate;
    public $mobile;
    public $sex;
    public $salary;
    public $employment;
    public $shedule;
    public $aboutme;
    public $qqq;
    public $aaa;
        
    /*public function ret()
{    
    return ['name'];
            
        
    } */

   public function rules()
    {
        
      /*  return [
             [['lastname', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary','sex','employment','qqq'], 'default', 'value' => null],
          //   [['qqq'], 'required', 'message' => 'Поле обязательно для заполнения'],
        ]; */
        
      return [
           [['lastname', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary'], 'required', 'message' => 'Поле обязательно для заполнения'],
           ['email', 'email', 'message' => 'Поле заполнено неверно'],
           ['email', 'email', 'message' => 'Поле заполнено неверно'],
           ['salary', 'integer', 'min' => '1', 'tooSmall' => 'Поле заполнено неверно'], 
           //['mobile', 'match', 'pattern' => '/^[+7]{1}[+|0-9| |-]*$/i', 'message' => 'Поле заполнено неверно'], 
          // ['mobile', 'match', 'pattern' => '/^[+7][+|0-9]{3}$/i', 'message' => 'Поле заполнено неверно'], 
            ['mobile', 'match', 'pattern' => '/^(\+7)[ |-]?[0-9]{3}[ |-]?[0-9]{3}[ |-]?[0-9]{2}[ |-]?[0-9]{2}$/i', 'message' => 'Поле заполнено неверно'], //пропускает только номера +7 123 456 78 90, после 7 только 10 цифр, на месте пробелов так же могут быть тире, либо же пробелов может не быть.
      
        ]; 
    } 
   /* public function validatePhone () {
        if (substr($this->mobile, 0, 2)!=="+7"){
            $this->addError('mobile', 'Поле заполнено неверно.');
        }
    }*/
}