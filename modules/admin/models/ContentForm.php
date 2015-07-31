<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ContentForm extends Model
{
    public $title;
    public $text;
    public $courses;
    public $tags;
    public $question;
    public $answer;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [            
            [['title', 'text'], 'required'],            
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
   
   public function getPhones(){
        return null;
   }
}
