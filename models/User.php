<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $DEFAULT_ROLE = 'student';
    public $repeatPassword;
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    public function scenarios()
    {
        return [
            'default' => ['email','firstname','lastname','middlename','password','status','created','verifyCode','role','repeatPassword'],
            'update' => ['email','firstname','lastname','middlename','role','status'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [            
            [['email', 'firstname','lastname','middlename'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 255],
            [['email', 'password', 'repeatPassword', 'firstname', 'lastname'], 'required', ],
            [['created', 'status'], 'integer'],            
            [['firstname', 'lastname', 'middlename'], 'string','min' => 2, 'max' => 255],            
            [['firstname', 'lastname', 'middlename', 'email'], 'trim'],            
            ['repeatPassword', 'compare', 'compareAttribute' => 'password'],
            ['email', 'email'],

            ['email', 'filter', 'filter' => 'trim'],                        
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'middlename' => 'Middle name',
            'status' => 'Status',
            'created' => 'Created',
            'verifyCode' => 'Verification Code',
        ];
    }

     /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {     
        return User::findOne($id);   
        //return User::find()->where(['id' => $id])->one();            
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new static();        
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByEmail($email)
    { 
        $user = User::find()->where(['email' => $email])->one(); 
        
        if($user==null) return null;             
        return $user;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->email === $email;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return md5('1^%$$#'+$this->password+'#@') === md5('1^%$$#'+$password+'#@');
    }

    /*public function updateUser($uModel){
        $user = User::findIdentity($uModel->id);
        $user->email = $uModel->email;
        $user->role = $uModel->role;
        $user->firstname = $uModel->firstname;
        $user->lastname = $uModel->lastname;
        $user->middlename = $uModel->middlename;
        $user->status = $uModel->status;

        if($user->save()){
            beforeSave            
        }
    }*/
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        // установка роли пользователя
        $auth = Yii::$app->authManager;
        $name = $this->role ? $this->role : $this->DEFAULT_ROLE;
        $role = $auth->getRole($name);
        if (!$insert) {
            $auth->revokeAll($this->id);
        }
        $auth->assign($role, $this->id);
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord && $insert){
            $this->created = time();
            $this->status = 0;            
            $this->role = $this->role ? $this->role : $this->DEFAULT_ROLE;
            $this->password = md5('1^%$$#'+$this->password+'#@');
        }            
        return parent::beforeSave($insert);
    }
}
