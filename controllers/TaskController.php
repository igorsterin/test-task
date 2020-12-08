<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EditForm;

class TaskController extends Controller
 {   
  public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionEdit()
    {
        $model = new EditForm();
        return $this->render('edit', ['model' => $model]);
    } 
    
    public function actionView()
    {
        return $this->render('view' );
    }
}
?>