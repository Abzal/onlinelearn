<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br />

    <div class="user-form">

    	<?php $form = ActiveForm::begin([
        	'id' => 'login-form',
        	'options' => ['class' => 'form-horizontal'],
        	'fieldConfig' => [
            	'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            	'labelOptions' => ['class' => 'col-lg-2 control-label'],
        	],
    	]); ?>

    	<?= $form->field($model, 'firstname')->textInput(['maxlength' => 50])->label('First Name') ?>

    	<?= $form->field($model, 'lastname')->textInput(['maxlength' => 50])->label('Last Name') ?>

    	<?= $form->field($model, 'middlename')->textInput(['maxlength' => 50])->label('Middle Name') ?>        	

    	<?= $form->field($model, 'email')->textInput(['maxlength' => 255])->label('E-mail') ?>

    	<?php
        	if($model->isNewRecord){
            	echo $form->field($model, 'password')->passwordInput(['maxlength' => 255])->label('Password')->passwordInput();    
            	echo $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => 255])->label('Repeat Password')->passwordInput();            	
        	}                         	     
    	?>

    	<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
        
    	<div class="form-group">
        	<div class="col-lg-offset-2 col-lg-11">
            	<?= Html::submitButton('Sign Up', ['class' => 'btn btn-success']) ?>
        	</div>
    	</div>

    	<?php ActiveForm::end(); ?>

		</div>  




