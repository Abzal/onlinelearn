<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Courses;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= /*$form->field($model, 'text')->textarea(['rows' => 6])*/ 
        $form->field($model, 'text')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
            ]);
    ?>

    <?= $form->field($model, 'courses_id')->dropDownList(Courses::getAll(),['prompt'=>'Select Course']) ?>

    <div class="form-group">
    	<div>
        	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
