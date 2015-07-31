<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="admin-default-index">
	<?php $form = ActiveForm::begin([
            'id' => 'user-update-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['placeholder' => 'Title']) ?>
    
    <?= $form->field($model, 'text')->textarea() ?>

	<?= $form->field($model, 'courses')->dropDownList(['reading' => 'Reading','writing' => 'Writing','Grammer'=>'grammer']); ?>  
 
	<?= $form->field($model, 'tags')->checkboxList(['7' => '7','8' => '8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','common'=>'common']); ?>	  
	<hr />
	<?= $form->field($model, 'question')->textInput() ?>

	<?= $form->field($model, 'answer')->textInput() ?>
	
    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $contentModel->getQuestions(),
        'pagination' => false
        ]),
        'columns' => [
            'question',
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    //'controller' => 'questions',
                    'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Add New', ['admin']),
                    'template' => '{update}{delete}',
                ]
            ]
        ]);?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-11">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>        
    </div>

    <?php ActiveForm::end(); ?>
</div>
