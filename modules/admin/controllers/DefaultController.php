<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\ContentForm;
use app\models\Content;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	$model = new ContentForm();
    	$contentModel = Content::findOne(1);

    	if ($model->load(Yii::$app->request->post())) {            
        } else {
            return $this->render('index', ['model' => $model, 'contentModel' => $contentModel,]);
        }

    }    
}
