<?php

class ModuleController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Lists all models.
     */
    public function actionIndex($idModule, $idCourse=0)
    {
        $model = Module::model()->with('teacher', 'lectures')->findByPk($idModule);

        $this->checkModelInstance($model);

        if($model->cancelled && !StudentReg::isAdmin()) {
            throw new CHttpException(403, 'Ти запросив сторінку, доступ до якої обмежений спеціальними правами. Для отримання доступу увійди на сайт з логіном адміністратора.');
        }

        $this->render('index', array(
            'post' => $model,
            'teachers' => $model->teacher,
            'editMode' => $model->isEditableByCurrentUser(),
            'lecturesTitles' => $model->lectures,
            'dataProvider' => $model->getLecturesDataProvider(),
            'idCourse' => $idCourse,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Modules the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Module::model()->findByPk($id);

        $this->checkModelInstance($model);

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Modules $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modules-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSaveLesson()
    {
        $newLectureParams = array (
            'titleUa' => Yii::app()->request->getParam('titleUa', ''),
            'titleRu' => Yii::app()->request->getParam('titleRu', ''),
            'titleEn' => Yii::app()->request->getParam('titleEn', ''),
            'order' => Yii::app()->request->getParam('order', 1)
        );

        //throw error if idModule is '0' or unset?
        $idModule = Yii::app()->request->getParam('idModule');

        $model = Module::model()->findByPk($idModule);

        $this->checkModelInstance($model);

        $lecture = $model->addLecture($newLectureParams);

        Yii::app()->user->setFlash('newLecture', 'Нова лекція №' . $lecture->order . $lecture->title_ua . 'додана до цього модуля');

        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionSaveModule()
    {
        $titleUa = Yii::app()->request->getPost('titleUA', '');
        $titleRu = Yii::app()->request->getPost('titleRU', '');
        $titleEn = Yii::app()->request->getPost('titleEN', '');
        $idCourse = Yii::app()->request->getPost('idCourse');
        $lang = Yii::app()->request->getPost('lang');

        $course = Course::model()->with("module")->findByPk($idCourse);

        $module = new Module();
        $module->initNewModule($course, $titleUa, $titleRu, $titleEn, $lang);

        if ($module !== null) {
            $course->updateCount();
        }

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(Yii::app()->request->urlReferrer);
        }

        $this->actionIndex($module->module_ID, $course->course_ID);
    }

    public function actionUnableLesson()
    {
        $idLecture = Yii::app()->request->getParam('idLecture');
        $idCourse = Yii::app()->request->getParam('idModule');

        $model = Module::model()->with('lectures')->findByPk($idCourse);

        $this->checkModelInstance($model);

        $model->disableLesson($idLecture);

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionUpLesson($idLecture, $idModule)
    {
        $module = Module::model()->with('lectures')->findByPk($idModule);

        $this->checkModelInstance($module);

        $module->upLecture($idLecture);

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionDownLesson($idLecture, $idModule)
    {
        $module = Module::model()->with('lectures')->findByPk($idModule);

        $this->checkModelInstance($module);

        $module->downLecture($idLecture);

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionLecturesUpdate()
    {
        $model = Module::model()->findByPk($_POST['idmodule']);
        $this->renderPartial('_addLessonForm', array('newmodel' => $model), false, true);
    }

    public function actionUpdateModuleAttribute()
    {
        $up = new EditableSaver('Module');
        $up->update();
    }

    public function actionUpdateModuleImage($id)
    {
        $model = $this->loadModel($id);
        if (isset($_POST['Module'])) {
            $model->oldLogo = $model->module_img;
            $imageName = $_FILES['Module']['name']['module_img'];
            $tmpName = $_FILES['Module']['tmp_name']['module_img'];
            if (!empty($imageName)) {
                $model->logo = $_FILES['Module'];
                if ($model->validate()) {
                    Avatar::updateModuleAvatar($imageName,$tmpName,$id,$model->oldLogo);
                    $this->redirect(Yii::app()->request->urlReferrer);
                }else {
                    $this->redirect(Yii::app()->request->urlReferrer);
                }
            } else {
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }

    }

    private function checkModelInstance($model) {
        if ($model === null)
            throw new \application\components\Exceptions\ModuleNotFoundException();
    }
}
