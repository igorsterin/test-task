<?php

namespace app\controllers;

use app\models\CheckBox;
use app\models\Image;
use Throwable;
use Yii;
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
        //в этой переменной будет содержаться запрплата, город, дата публикации и число просмотров
        $listResume = Resume::find()
            ->select(['id', 'salary', 'city', 'pubdate', 'views'])
            ->asArray()
            ->all();
        $count = Resume::find()->count();

        //замена даты публикации с формата yyyy:mm:dd hh:mm:ss на формат dd месяц на русском yyyy в hh:mm
        $listResume = (new NiceDate)->replaceAllDate($listResume, $count);

        return $this->render(
            'index',
            [
                'lr' => $listResume,
                'count' => $count,
                'url1' => Url::toRoute(['resume/create']),

            ]
        );
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
            $delRes = CheckBox::findOne($id);
            $delRes->delete();
            return Resume::find()->count();
        }
    }

    /**
     * Страница создания резюме (работает на базе actionEdit)
     *
     * @return string|Response
     */
    public function actionCreate()
    {
        return $this->actionEdit(null);
    }

    /**
     * Отображает либо страницу создания резюме (при вызове в ActionCreate), либо редактирования резюме
     *
     * @param $id int|null
     * @return string|Response
     * @throws \yii\base\InvalidConfigException
     */
    public function actionEdit($id)
    {
        //id будет пустое при создании резюме
        if (empty($id)) {
            $resume = new Resume();
            $image = new Image();
            $checkBox = new CheckBox();
            $title = 'Новое резюме';
            $photo = 'images/profile-foto.jpg';
            //если резюме создается, то загрузка фото в input file обязательно
            $image->skip = false;
        } else {
            $resume = Resume::findOne($id);
            $image = new Image();
            $checkBox = CheckBox::findOne($id);
            $title = 'Редактировать резюме';
            $photo = 'uploads/' . $resume->photo;
            //если редактируется, то не обязательно (потому что фото у резюме уже есть, а значение input file нельзя менять программно, и при открытии страницы он будет пустой, в отличие от других input)
            $image->skip = true;
        }

        //выполняется когда форма заполнена
        if ($resume->load(Yii::$app->request->post()) && $checkBox->load(Yii::$app->request->post()) ) {
            $image->imageFile = UploadedFile::getInstance($image, 'imageFile');

            // если фото загружено (но вне зависимости от этого, метод upload проведет валидацию данных формы)
            if ($image->upload()) {
                $resume->photo = $image->imageFile->name;
                /*$resume->employment = json_encode($resume->employment, JSON_UNESCAPED_UNICODE);
                $resume->shedule = json_encode($resume->shedule, JSON_UNESCAPED_UNICODE);*/
                $checkBox->save();
                $resume->save();
                return $this->redirect('index');
            }

            //при редактировании, если фото не изменено
            /*$resume->employment = json_encode($resume->employment, JSON_UNESCAPED_UNICODE);
            $resume->shedule = json_encode($resume->shedule, JSON_UNESCAPED_UNICODE);*/
            $checkBox->save();
            $resume->save();
            return $this->redirect('index');
        } else {
// эта часть кода выполняется, если страница отображается первый раз, либо есть ошибка в данных
            $empl = (new Checked)->employmentClick(json_decode($resume->employment));
            $shdl = (new Checked)->sheduleClick(json_decode($resume->shedule));
            return $this->render(
                'edit',
                [
                    'checkBox' => $checkBox,
                    'image' => $image,
                    'model' => $resume,
                    'resume' => $resume,
                    'empl' => $empl,
                    'shdl' => $shdl,
                    'title' => $title,
                    'photo' => $photo
                ]
            );
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
        $checkBox = CheckBox::findOne($id);
/*var_dump($checkBox);*/  /*echo key($checkBox->attributes[2]);*/ //echo $checkBox['Полная занятость'];
        //вычисляет возраст по дате рождения
        $age = (new AgeCalc)->run($thisResume->birthdate);
        //var_dump(array_chunk($checkBox->attributes, 6, TRUE));
       return $this->render('view', ['tr' => $thisResume, 'age' => $age, 'cb' => $checkBox]);
    }
}


?>