<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Products('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		// echo Yii::app()->user->id;
		// die();
		if (isset($_POST['Products'])) {
			$id = User::model()->findByAttributes(['id' => \Yii::app()->user->id])->id;
			$rnd = rand(0, 9999);

			$model->attributes = $_POST['Products'];


			$uploadedFile = CUploadedFile::getInstance($model, 'img');
			$fileName = "{$rnd}-{$uploadedFile}";

			$model->img = "/product/$fileName";
			$model->user_id = $id;
			if ($model->save()) {

				$dir = Yii::getPathOfAlias('webroot') . '/product/';

				$uploadedFile->saveAs($dir . $fileName);

				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Products'])) {
			$id = User::model()->findByAttributes(['username' => \Yii::app()->user->id])->id;
			$rnd = rand(0, 9999);

			$_POST['Products']['img'] = $model->img;
			$model->attributes = $_POST['Products'];

			$uploadedFile = CUploadedFile::getInstance($model, 'img');
			$fileName = "{$rnd}-{$uploadedFile}";

			if (!empty($uploadedFile)) {
				$model->img = "/product/$fileName";
			}
			$model->user_id = $id;

			if ($model->save()) {
				if (!empty($uploadedFile))  // check if uploaded file is set or not
				{
					$dir = Yii::getPathOfAlias('webroot') . '/product/';

					$uploadedFile->saveAs($dir . $fileName);

					$this->redirect(array('view', 'id' => $model->id));
				}
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$model->is_deleted = 1;
		$model->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$dataProvider = new CActiveDataProvider('Products', array(
			'criteria' => array(
				'condition' => 'is_deleted=0',
				'order' => 'created_at DESC',
			),
		));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Products('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Products']))
			$model->attributes = $_GET['Products'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Products::model()->findByPk($id);


		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'products-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
