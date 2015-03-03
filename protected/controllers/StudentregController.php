<?php

class StudentRegController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','edit','profile','sendletter','rewrite'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new StudentReg;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */

    public function actionIndex()
    {
        $model=new StudentReg();
        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            if($model->validate())
            {
                if ($model->model()->count("email = :email", array(':email' => $model->email)))
                {
                    // Указанный email уже занят. Создаем ошибку и передаем в форму
                    $model->addError('email', 'Email уже зайнятий');
                    $this->render("studentreg", array('model' => $model));
                }else
                {
                    if($_FILES["upload"]["size"] > 1024*1024*0.5)
                    {
                        Yii::app()->user->setFlash('avatarmessage','Розмір файла перевищує 500кб');
                    }elseif (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
                        $ext = substr(strrchr( $_FILES["upload"]["name"],'.'), 1);
                        $id='1'.'id';
                        $_FILES["upload"]["name"]=$id . '.'. $ext;
                        move_uploaded_file($_FILES["upload"]["tmp_name"],
                            Yii::app()->request->baseUrl ."css/images/".$_FILES["upload"]["name"]);
                        $model->avatar= Yii::app()->request->baseUrl ."css/images/".$_FILES["upload"]["name"];
                    }
                    $model->save();
                    Yii::app()->user->setFlash('message','Ваші дані оновлено');
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                }

            } else {
                $this->render("studentreg", array('model'=>$model));
            }
        }else {
            $this->render("studentreg", array('model'=>$model));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new StudentReg('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['StudentReg']))
            $model->attributes=$_GET['StudentReg'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return StudentReg the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=StudentReg::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param StudentReg $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='student-profile-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionProfile()
    {
        $model=new StudentReg();

        $this->render("studentprofile", array('model'=>$model));

    }
    public function actionSendletter()
    {
        $model=StudentReg::model()->findByPk(1);

        if($_POST['submit']) {
            if(!empty($_POST['send_letter'])) {
                $title = $_POST['letterTheme'];
                $mess = $_POST['send_letter'];
                // $to - кому отправляем
                $to = 'Wizlightdragon@gmail.com';
                // $from - от кого
                $from = $model->email;
                // функция, которая отправляет наше письмо.
                mail($to, $title, $mess, "Content-type: text/html; charset=utf-8 \r\n" . "From:" . $from . "\r\n");
                Yii::app()->user->setFlash('messagemail','Ваше повідомлення відправлено');
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
    public function actionEdit()
    {
        $model=new StudentReg();

        $this->render("studentprofileedit", array('model'=>$model));

    }
    public function actionRewrite()
    {
        $model=new StudentReg();

        if(!empty($_POST['StudentReg']['firstName'])) {
            StudentReg::model()->updateByPk(1, array('firstName' => $_POST['StudentReg']['firstName']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['secondName'])) {
            StudentReg::model()->updateByPk(1, array('secondName' => $_POST['StudentReg']['secondName']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['middleName'])) {
            StudentReg::model()->updateByPk(1, array('middleName' => $_POST['StudentReg']['middleName']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['birthday'])) {
            StudentReg::model()->updateByPk(1, array('birthday' => $_POST['StudentReg']['birthday']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['email'])) {
            StudentReg::model()->updateByPk(1, array('email' => $_POST['StudentReg']['email']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['password'])) {
            StudentReg::model()->updateByPk(1, array('password' => $_POST['StudentReg']['password']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['phone'])) {
            StudentReg::model()->updateByPk(1, array('phone' => $_POST['StudentReg']['phone']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['address'])) {
            StudentReg::model()->updateByPk(1, array('address' => $_POST['StudentReg']['address']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['education'])) {
            StudentReg::model()->updateByPk(1, array('education' => $_POST['StudentReg']['education']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['interests'])) {
            StudentReg::model()->updateByPk(1, array('interests' => $_POST['StudentReg']['interests']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_POST['StudentReg']['aboutMy'])) {
            StudentReg::model()->updateByPk(1, array('aboutMy' => $_POST['StudentReg']['aboutMy']));
            Yii::app()->user->setFlash('messageedit','Оновлено');
        }
        if(!empty($_FILES["upload"])) {
            if($_FILES["upload"]["size"] > 1024*1024*0.5)
            {
                Yii::app()->user->setFlash('avatarmessage','Розмір файла перевищує 500кб');
            }elseif (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
                $ext = substr(strrchr( $_FILES["upload"]["name"],'.'), 1);
                $id='1'.'id';
                $_FILES["upload"]["name"]=$id . '.'. $ext;
                move_uploaded_file($_FILES["upload"]["tmp_name"],
                    Yii::app()->request->baseUrl ."css/images/".$_FILES["upload"]["name"]);
                StudentReg::model()->updateByPk(1, array('avatar' => Yii::app()->request->baseUrl ."css/images/".$_FILES["upload"]["name"]));
                Yii::app()->user->setFlash('messageedit','Оновлено');
            }
        }
        header ('location: /index.php/?r=studentreg/profile');
    }
}
