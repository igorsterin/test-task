<?php

namespace app\controllers;

use app\models\Checkbox;
use app\models\Image;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\Controller;
use app\models\Resume;
use app\models\NiceDate;
use app\models\AgeCalc;
use app\models\Checked;
use yii\helpers\Url;
use yii\base\Action;
use yii\helpers\html;
use yii\web\Response;
use yii\web\UploadedFile;

class ResumeController extends Controller
{

    /**
     * Страница "Мои резюме" (домашняя страница)
     *
     * @return string
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionIndex()
    {
        $provider = new ActiveDataProvider(
            [
                'query' => Resume::find()
                    ->select(['id', 'salary', 'city', 'pub_date', 'views'])
            ]
        );
        $listResume = $provider->getModels();
        $count = Resume::find()->count();
        $data = compact('listResume', 'count');

        return $this->render('index', ['data' => $data]);
    }

    /**
     * Принимает post-запрос на удаление указанного резюме, удаляет его из базы данных, и возвращает текущее число находящихся в базе резюме
     *
     * @return int
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('param');
        if ($id) {
            $delRes = Resume::findOne($id);
            $delRes->delete();
            $delRes = Checkbox::findOne($id);
            $delRes->delete();
            return Resume::find()->count();
        }
    }

    /**
     * Страница создания резюме
     *
     * @return string|Response
     */
    public function actionCreate()
    {
        $resume = new Resume();
        $image = new Image();
        $checkbox = new Checkbox();
        //если резюме создается, то загрузка фото в input file обязательно
        $image->skip = false;

        //выполняется когда форма заполнена
        if ($resume->load(Yii::$app->request->post()) && $checkbox->load(Yii::$app->request->post())) {
            $image->imageFile = UploadedFile::getInstance($image, 'imageFile');
            // если фото загружено
            if ($image->upload()) {
                $resume->photo = $image->imageFile->name;
                $checkbox->save();
                $resume->save();
                return $this->redirect('index');
            }
        } else {
// эта часть кода выполняется, если страница отображается первый раз, либо есть ошибка в данных
            $data = compact('checkbox', 'image', 'resume');
            return $this->render('create', ['data' => $data]);
        }
    }

    /**
     * Страница редактирования резюме
     *
     * @param $id
     * @return string|Response
     */
    public function actionUpdate($id)
    {
        $resume = Resume::findOne($id);
        $image = new Image();
        $checkbox = Checkbox::findOne($id);
        //если редактируется, то не обязательно (потому что фото у резюме уже есть, а значение input file нельзя менять программно, и при открытии страницы он будет пустой, в отличие от других input)
        $image->skip = true;

        //выполняется когда форма заполнена
        if ($resume->load(Yii::$app->request->post()) && $checkbox->load(Yii::$app->request->post())) {
            $image->imageFile = UploadedFile::getInstance($image, 'imageFile');

            // если фото загружено (но вне зависимости от этого, метод upload проведет валидацию данных формы)
            if ($image->upload()) {
                $resume->photo = $image->imageFile->name;
                $checkbox->save();
                $resume->save();
                return $this->redirect('index');
            }
            //при редактировании, если фото не изменено
            $checkbox->save();
            $resume->save();
            return $this->redirect('index');
        } else {
// эта часть кода выполняется, если страница отображается первый раз, либо есть ошибка в данных
            $data = compact('checkbox', 'image', 'resume');
            return $this->render('update', ['data' => $data]);
        }
    }

    /**
     * Страница просмотра резюме
     *
     * @param $id int
     * @return string
     */
    public function actionView($id)
    {
        $thisResume = Resume::findOne($id);
        $thisResume->views++;
        $thisResume->save(false);
        $checkbox = Checkbox::findOne($id);
        $data = compact('thisResume', 'checkbox');

        return $this->render('view', ['data' => $data]);
    }
}


?>