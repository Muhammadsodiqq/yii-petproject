<?php

class RegisterController extends Controller
{
	private $_identity;

	public function actionIndex()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model["password"]= CPasswordHelper::hashPassword($model["password"]);
			if($model->save())
			$model["password"]= $_POST['User']['password'];
			$this->_identity = new UserIdentity($model->username,$model->password);

			if($this->_identity->authenticate()){
				Yii::app()->user->login($this->_identity);
				 $this->redirect("/");
		   }

		}
		$model["password"] = "";

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
}