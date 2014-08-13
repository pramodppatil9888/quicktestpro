<?php

class TestAssignController extends Controller
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
				'actions'=>array('index','view','AutoComplete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','StatusChange'),
				'users'=>Yii::app()->user->isAdmin(),
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
		$model=new TestAssign;


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TestAssign']))
		{
			
			$model->attributes=$_POST['TestAssign'];
			
			$user = Users::model()->findByAttributes(array('email'=>$_POST['TestAssign']['user_id']));
			if(isset($user))
			{
				$model->user_id = $user->user_id;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->test_assign_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}



	public function actionStatusChange()
	{
		$model=new TestAssign('statusChange');


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TestAssign']))
		{
			
			$model->attributes=$_POST['TestAssign'];
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->test_assign_id));
		}

		$this->render('status_change',array(
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

		if(isset($_POST['TestAssign']))
		{
			$model->attributes=$_POST['TestAssign'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->test_assign_id));
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
		$dataProvider=new CActiveDataProvider('TestAssign');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TestAssign('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TestAssign']))
			$model->attributes=$_GET['TestAssign'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TestAssign the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TestAssign::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TestAssign $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='test-assign-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
public function actionAutoComplete()
        {
            $res=array();
            if(isset($_GET['term'])){
                $qtxt='select email,user_id,first_name,last_name from users where email LIKE :b or first_name LIKE :b or last_name LIKE :b or user_id like :b';
            $command=YII::app()->db->createCommand($qtxt);
            $command->bindValue(":b",''.$_GET['term'].'%',PDO::PARAM_STR);
            $res=$command->queryColumn();
            }
            echo CJSON::encode($res);
            YII::app()->end();
        }



}
