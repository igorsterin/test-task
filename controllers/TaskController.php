<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EditForm;
use app\models\Resume;
use app\models\NiceDate;
use app\models\AgeCalc;
use app\models\Checked;
use yii\helpers\Url;
use yii\base\Action;
use yii\helpers\html;
use app\models\UploadForm;
use yii\web\UploadedFile;

class TaskController extends Controller
 {   

    
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
                                       'url1' => Url::toRoute(['task/create']), 
                                       
                                      ]);
    }
    
        
    
    public function actionCreate()
    {
        return $this->actionEdit(null);
        
    } 
    
    
    public function actionEdit($id)
    {
        $model = new EditForm();
    if (empty($id)) {$resume = new Resume(); $title = 'Новое резюме';} else {$resume = Resume::findOne($id); $title = 'Редактировать резюме';}
        
      if ($model->load(Yii::$app->request->post()) /*  && $model->validate() */) 
      {   
          //когда форма заполнена и данные прошли проверку
          $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
              
$resume->photo = $model->imageFile;
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
$resume->employment = json_encode($model->employment, JSON_UNESCAPED_UNICODE);
$resume->shedule = json_encode($model->shedule, JSON_UNESCAPED_UNICODE);
$resume->aboutme = ($model->aboutme);
$resume->save(); 
          
//return $this->render('edit-confirm', ['model' => $model]);
return $this->redirect('index');}
          
        } 
            else 
        {
            // либо страница отображается первый раз, либо есть ошибка в данных
$empl = Checked::employment(json_decode($resume->employment));
 $shdl = Checked::shedule(json_decode($resume->shedule));
return $this->render('edit', ['model' => $model, 'resume' => $resume, 'empl' => $empl, 'shdl' => $shdl, 'title' => $title]);
        }
    }
    
    
    
    public function actionView($id)
    {
        $thisresume = Resume::findOne($id);
$thisresume->views++;
$thisresume->save();
        $age = AgeCalc::run($thisresume->birthdate); //вычисляет возраст по дате рождения
            
        return $this->render('view', ['tr' => $thisresume, 'age' => $age]);
    }
}


?>