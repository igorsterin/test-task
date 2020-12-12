<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EditForm;
use app\models\Resume;

class TaskController extends Controller
 {   
  public function actionIndex()
    {
      $listresume = Resume::find()
            ->select (['salary','city','pubdate','views'])
            ->where (1)
            ->asArray()
            ->all();
          $count = Resume::find()->count();
          
        return $this->render('index', ['lr' => $listresume, 'count' => $count]);
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
if ($model->employment!==null) {$resume->employment = json_encode($model->employment);} else {$resume->employment = $model->employment;}
if ($model->shedule!==null) {$resume->shedule = json_encode($model->shedule);} else {$resume->shedule = $model->shedule;}
$resume->aboutme = $model->aboutme;
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
    
    public function actionView()
    {
        return $this->render('view' );
    }
}
?>