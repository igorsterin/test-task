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
      $id = Yii::$app->request->post('param');
    if  ($id) {                          
        $delres = Resume::findOne($id);
        $delres->delete();
        return Resume::find()->count();
    }            //<--данная часть кода выполнятся как ответ на ajax-post-запрос на удаление резюме
      
      $listresume = Resume::find() //в этой переменной будет содержаться запрплата, город, дата публикации и число просмотров
            ->select (['id','salary','city','pubdate','views'])
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
    if (empty($id)) {                //id будет пустое при создании резюме
        $resume = new Resume(); 
        $title = 'Новое резюме'; 
        $photo = 'images/profile-foto.jpg'; 
        $model->skip = false;                     //если резюме создается, то загрузка фото в input file обязательно
    }   
        else {
            $resume = Resume::findOne($id); 
            $title = 'Редактировать резюме'; 
            $photo = 'uploads/'.$resume->photo; 
            $model->skip = true;                 //если редактируется, то не обязательно (потому что фото у резюме уже есть, а значение input file нельзя менять программно, и при открытии страницы он будет пустой, в отличие от других input)
        }
        

                  if ($model->load(Yii::$app->request->post()) /*  && $model->validate() */)      //выполняется когда форма заполнена 
                  {     
                      $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                        if ($model->upload()) {                     // если фото загружено (но вне зависимости от этого, метод upload проведет валидацию данных формы)
                          $this->resumeSave($resume, $model);       //при создании, или при редактировании, если изменено фото
                            return $this->redirect('index');

                            //return $this->render('edit-confirm', ['model' => $model]);
                        }
    
$this->resumeSave($resume, $model); //при редактировании, если фото не изменено 
return $this->redirect('index');
        } 
            else 
        {
            // эта часть кода выполняется, если страница отображается первый раз, либо есть ошибка в данных
                
$empl = Checked::employment(json_decode($resume->employment));
 $shdl = Checked::shedule(json_decode($resume->shedule));
return $this->render('edit', ['model' => $model, 'resume' => $resume, 'empl' => $empl, 'shdl' => $shdl, 'title' => $title, 'photo' => $photo]);
        }
    }
    
    
    
    public function resumeSave ($resume, $model) //часть actionEdit, вынесена в отдельный метод, чтобы два раза не повторять
    {
if ($model->imageFile!==null) {$resume->photo = $model->imageFile;}
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