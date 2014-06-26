<?php

class EmployeesController extends Controller
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
			'postOnly + delete,addsubordinates', // we only allow deletion via POST request
			'ajaxOnly + autocomplete,addsubordinates', // we only allow deletion via POST request
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
				'actions'=>array('index','view','tree'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','autocomplete','addsubordinates'),
				'users'=>array('@'),
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
                $model = $this->loadModel($id);
                $descendants=$model->descendants()->findAll();

                $arrayDataProvider=new CArrayDataProvider($descendants, array(
                        'keyField'=>'employee_id',
                        'pagination'=>array(
                                'pageSize'=>10,
                        ),
                ));

		$this->render('view',array(
			'model'=>$model,
                        'dataProvider'=>$arrayDataProvider
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
                $model=new Employees;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $parent_id = isset($_GET['parent_id']) ? (int)$_GET['parent_id'] : 0;
                $root = Employees::model()->findByPk($parent_id);

		if (isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];

                        if ($root) {

                                if ($model->appendTo($root))
                                        $this->redirect(array('view','id'=>$model->employee_id));
                        } else {

                                if ($model->saveNode())
                                        $this->redirect(array('view','id'=>$model->employee_id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'supervisor'=>$root,
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

		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->employee_id));
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
		$this->loadModel($id)->deleteNode();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Employees');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists tree all models.
	 */
	public function actionTree()
	{

                $criteria=new CDbCriteria;
                $criteria->order='t.root, t.lft';

                $dataProvider=new CActiveDataProvider('Employees', array(
			'criteria'=>$criteria,
		));

                $this->render('tree',array(
                        'dataProvider'=>$dataProvider,
                ));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employees']))
			$model->attributes=$_GET['Employees'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Employees the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Employees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Employees $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        /**
         * Autocomplete
         * @return string $list
         */
        public function actionAutocomplete()
        {
                $list ='';

                if (isset($_GET['q'])) {
                        $name = $_GET['q'];
                        $criteria = new CDbCriteria;
                        $criteria->condition = "employee_id=root AND (first_name LIKE :name OR last_name LIKE :name)";
                        $criteria->params = array(":name"=>"%$name%");
                        $criteria->limit = 20;
                        $emplArray = Employees::model()->findAll($criteria);

                        foreach ( $emplArray as $model)
                        {
                            $list .= $model->first_name.' '.$model->last_name.'|'.$model->employee_id. "\n";
                        }
                }

                echo $list;
                Yii::app()->end();
        }

        /**
         * Add Relations
         * @throws CHttpException
         */
        public function actionAddSubordinates()
        {
                if (!isset($_POST['employee_id']) || !isset($_POST['parent_id'])) throw new CHttpException(404,'The requested page does not exist.');

                $root = Employees::model()->findByPk((int)$_POST['employee_id']);
                $child = Employees::model()->findByPk((int)$_POST['parent_id']);

                if ($root && $child)
                    $root->moveAsFirst($child);

                Yii::app()->end();
        }
}
