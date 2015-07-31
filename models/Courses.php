<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%courses}}".
 *
 * @property integer $id
 * @property string $courses
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%courses}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courses'], 'required'],
            [['courses'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courses' => 'Courses',
        ];
    }

    public function getAll(){        
        return ArrayHelper::map(Courses::find()->all(),'id','courses');
    }

    public function getCoursesName(){
        return $this->courses;
    }
}
