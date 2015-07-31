<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'firstname',
            'lastname',
            'email:email',            
            'role',            
            // 'middlename',            
            [
            'attribute' => 'created',
            'format' => 'html',
            'value' => function ($model, $index, $widget) {
                    return date("j.m.Y", $model->created);
                },
            'filter' => false            
            ],
            [
            'attribute' => 'status',
            'format' => 'html',
            'value' => function ($model, $index, $widget) {
                    return ($model->status==1)?"Ban":"Active";
                },            
            'filter' => array(0 => "Active",1 => "Ban" )
            ], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
