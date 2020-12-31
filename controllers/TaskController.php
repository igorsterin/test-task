<?php

namespace app\controllers;

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

class TaskController extends Controller
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
        $id = Yii::$app->request->post('param');
        if ($id) {
            //данная часть кода выполнятся как ответ на ajax-post-запрос на удаление резюме
            $delres = Resume::findOne($id);
            $delres->delete();
            return Resume::find()->count();
        }

        //в этой переменной будет содержаться запрплата, город, дата публикации и число просмотров
        $listresume = Resume::find()
            ->select(['id', 'salary', 'city', 'pubdate', 'views'])
            ->where(1)
            ->asArray()
            ->all();
        $count = Resume::find()->count();

        //замена даты публикации с формата yyyy:mm:dd hh:mm:ss на формат dd месяц на русском yyyy в hh:mm
        $listresume = (new NiceDate)->replaceAllDate($listresume, $count);

        return $this->render(
            'index',
            [
                'lr' => $listresume,
                'count' => $count,
                'url1' => Url::toRoute(['task/create']),

            ]
        );
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
     */
    public function actionEdit($id)
    {
        //id будет пустое при создании резюме
        if (empty($id)) {
            $resume = new Resume();
            $title = 'Новое резюме';
            $photo = 'images/profile-foto.jpg';
            //если резюме создается, то загрузка фото в input file обязательно
            $resume->skip = false;
        } else {
            $resume = Resume::findOne($id);
            $title = 'Редактировать резюме';
            $photo = 'uploads/' . $resume->photo;
            //если редактируется, то не обязательно (потому что фото у резюме уже есть, а значение input file нельзя менять программно, и при открытии страницы он будет пустой, в отличие от других input)
            $resume->skip = true;
        }

        //выполняется когда форма заполнена
        if ($resume->load(Yii::$app->request->post())) {
            $resume->imageFile = UploadedFile::getInstance($resume, 'imageFile');

            // если фото загружено (но вне зависимости от этого, метод upload проведет валидацию данных формы)
            if ($resume->upload()) {
                $resume->photo = $resume->imageFile;
                $resume->employment = json_encode($resume->employment, JSON_UNESCAPED_UNICODE);
                $resume->shedule = json_encode($resume->shedule, JSON_UNESCAPED_UNICODE);
                $resume->save(false);
                return $this->redirect('index');
            }

            //при редактировании, если фото не изменено
            $resume->employment = json_encode($resume->employment, JSON_UNESCAPED_UNICODE);
            $resume->shedule = json_encode($resume->shedule, JSON_UNESCAPED_UNICODE);
            $resume->save(false);
            return $this->redirect('index');
        } else {
// эта часть кода выполняется, если страница отображается первый раз, либо есть ошибка в данных
            $empl = (new Checked)->employmentClick(json_decode($resume->employment));
            $shdl = (new Checked)->sheduleClick(json_decode($resume->shedule));
            return $this->render(
                'edit',
                [
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
        $thisresume = Resume::findOne($id);
        $thisresume->views++;
        $thisresume->save(false);

        //вычисляет возраст по дате рождения
        $age = (new AgeCalc)->run($thisresume->birthdate);

        return $this->render('view', ['tr' => $thisresume, 'age' => $age]);
    }
}


?>