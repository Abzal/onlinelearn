<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%answer}}".
 *
 * @property integer $id
 * @property string $answer
 * @property integer $question_id
 * @property integer $correct
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer', 'question_id', 'correct'], 'required'],
            [['answer'], 'string'],
            [['question_id', 'correct'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'answer' => 'Answer',
            'question_id' => 'Question ID',
            'correct' => 'Correct',
        ];
    }
}
