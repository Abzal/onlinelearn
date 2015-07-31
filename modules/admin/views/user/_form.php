<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
            'id' => 'user-update-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
        ]); ?>
   
    <?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model, 'role')->dropDownList(['student' => 'Student','teacher' => 'Teacher','admin'=>'Administrator'], ['prompt'=>'I am "' . $model->role . '"']); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => 50]) ?>
    <?php 
        if(Yii::$app->user->can('admin'))
            echo $form->field($model, 'status')->dropDownList([0 => 'Active',1 => 'Ban'], ['prompt'=>'I am "' . ($model->status ? 'Ban':'Active') . '"']);
    ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-11">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>        
    </div>

    <?php ActiveForm::end(); ?>

</div>
