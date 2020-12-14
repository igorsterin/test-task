<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EditForm;
use app\models\Resume;
use app\models\NiceDate;
use app\models\AgeCalc;
use yii\helpers\Url;
use yii\base\Action;
use yii\helpers\html;

class TaskController extends Controller
 {   
   /* public $url = [
        'edit' => Url::toRoute(['task/edit']),
        'view' => Url::toRoute(['task/view']),
    ];*/
    
    

    
    
  public function actionIndex()
    {
      $listresume = Resume::find() //в этой переменной будет содержаться запрплата, город, дата публикации и число просмотров
            ->select (['salary','city','pubdate','views'])
            ->where (1)
            ->asArray()
            ->all();
          $count = Resume::find()->count();
      $listresume = NiceDate::replaceAllDate($listresume, $count); //замена даты публикации с формата yyyy:mm:dd hh:mm:ss на формат dd месяц на русском yyyy в hh:mm
          
        return $this->render('index', ['lr' => $listresume, 
                                       'count' => $count, 
                                       'url1' => Url::toRoute(['task/edit']), 
                                       
                                      ]);
    }
    
        
    
    public function actionEdit()
    {
        $model = new EditForm();
        
      if ($model->load(Yii::$app->request->post())  && $model->validate()  ) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
          
         $resume = new Resume();
$resume->photo = $model->photo;
$resume->lastname = $model->lastname;
$resume->name = $model->name;
$resume->middlename = $model->middlename;
$resume->birthdate = $model->birthdate;
$resume->sex = $model->sex;
$resume->city = $model->city;
$resume->email = $model->email;
$resume->mobile = $model->mobile;
$resume->specialization = $model->specialization;
$resume->salary = $model->salary;
if ($model->employment!==null) {$resume->employment = json_encode($model->employment, JSON_UNESCAPED_UNICODE);} else {$resume->employment = $model->employment;}
if ($model->shedule!==null) {$resume->shedule = json_encode($model->shedule, JSON_UNESCAPED_UNICODE);} else {$resume->shedule = $model->shedule;}
$resume->aboutme = ($model->aboutme);
$resume->save(); 
          
          /*Resume::find()
            ->select (['middlename'])
            ->where (['id' => 1])
            ->asArray()
             ->one();*/
            
            return $this->render('edit-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('edit', ['model' => $model]);
        }
    } 
    
    public function actionView($id)
    {
       /* $thisresume = Resume::find() 
            ->select (['lastname','name','middlename','birthdate','city','email','mobile','salary','employment','shedule','aboutme','views'])
            ->where (['id' => $id])
            ->asArray()
            ->one();*/
        $thisresume = Resume::findOne($id);
$thisresume->views++;
$thisresume->save();
        $age = AgeCalc::run($thisresume->birthdate);
            
        return $this->render('view', ['tr' => $thisresume, 'age' => $age]);
    }
}


?>