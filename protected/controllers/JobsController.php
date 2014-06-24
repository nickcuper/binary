<?php

class JobsController extends Controller
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
				'actions'=>array('index','view', 'uploadfilebyajax','showmodal', 'applyJob'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','retrieve', 'downloadfile'),
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
                $criteria=new CDbCriteria();


                $criteria->condition = 'job_id='.$id;

		$dataProvider=new CActiveDataProvider('Users2jobs', array(
                        'criteria'=>$criteria,
                ));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'retrieveProvider'=> $dataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Jobs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Jobs']))
		{
			$model->attributes=$_POST['Jobs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->job_id));
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

		if(isset($_POST['Jobs']))
		{
			$model->attributes=$_POST['Jobs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->job_id));
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
                $criteria=new CDbCriteria();

                if (Yii::app()->user->isGuest)
                    $criteria->condition = 'status='.Jobs::STATUS_AVAILABLE;

		$dataProvider=new CActiveDataProvider('Jobs', array(
                        'criteria'=>$criteria,
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Jobs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Jobs']))
			$model->attributes=$_GET['Jobs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        /**
         * Change Status For Job by Id
         * @param integer $id the ID of the model to be deleted
         */
        public function actionRetrieve($id)
        {
            Jobs::model()->updateByPk($id, array('status' => Jobs::STATUS_AVAILABLE));
            Yii::app()->end();
        }

        /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Jobs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Jobs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Jobs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='jobs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        /**
         * Ajax request that create form for modal
         *
         * @param type $id
         */
        public function actionShowModal($id)
        {
            $model = new Users2jobs('create');
            $model->job_id = $id;

            $this->renderPartial('_modal', array('model' => $model), false, true);
        }

        /**
         *
         */
        public function actionApplyJob()
        {
            if(isset($_POST['ajax']) && $_POST['ajax']==='applyjob')
            {
                $model = new Users2jobs();
                $model->attributes = $_POST['Users2jobs'];

                echo CActiveForm::validate($model);

                if ($model->validate() && $model->save())
                {
                    Jobs::model()->updateByPk($model->job_id, array('status' => Jobs::STATUS_NOT_AVAILABLE));
                }

                Yii::app()->end();
            }

        }

        /**
         * Upload Ajax File
         */
        public function actionUploadFileByAjax()
        {
            Yii::import("ext.EAjaxUpload.qqFileUploader");

            $folder='upload/';// folder for uploaded files
            $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

            $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
            $fileName=$result['filename'];//GETTING FILE NAME

            echo $return;// it's array
        }

        /**
         * Download File By Users2jobs_id
         *
         * @param Integer $id
         */
        public function actionDownloadFile($id)
        {
            $model = Users2jobs::model()->findByPk($id);
            $filepath = 'upload/'.$model->cv_path;

            if (!file_exists($filepath)) Yii::app()->end();

            $file_content = file_get_contents($filepath);

            if ($filepath && $file_content !== false) {
                Yii::app()->request->sendFile($model->cv_path, $file_content);
            }

        }
}
