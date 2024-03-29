<?php
namespace app\components\rbac;
 
use Yii;
use yii\rbac\Rule;
 
/**
 * User group rule class.
 */
class GroupRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'group';
 
    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;
 
            if ($item->name === 'superadmin') {
                return $role === $item->name;
            } elseif ($item->name === 'admin') {
                return $role === $item->name || $role === 'superadmin';
            } elseif ($item->name === 'teacher') {
                return $role === $item->name || $role === 'superadmin' || $role === 'admin';
            } elseif ($item->name === 'student') {
                return $role === $item->name || $role === 'superadmin' || $role === 'admin' || $role === 'teacher';
            }
        }
        return false;
    }
}