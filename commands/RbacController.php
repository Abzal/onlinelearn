<?php
namespace app\commands;
 
use Yii;
use yii\console\Controller;
use app\components\rbac\GroupRule;
use yii\rbac\DbManager;
 
/**
 * RBAC console controller.
 */
class RbacController extends Controller
{
    /**
     * Initial RBAC action
     * @param integer $id Superadmin ID
     */
    public function actionInit($id = null)
    {
        $auth = new DbManager;
        $auth->init();
 
        $auth->removeAll(); //удаляем старые данные
        // Rules
        $groupRule = new GroupRule();
 
        $auth->add($groupRule);
 
        // Roles
        $student = $auth->createRole('student');
        $student->description = 'Student';
        $student->ruleName = $groupRule->name;
        $auth->add($student);
 
        $teacher = $auth->createRole('teacher');
        $teacher ->description = 'Teacher';
        $teacher ->ruleName = $groupRule->name;
        $auth->add($teacher);
        $auth->addChild($teacher, $student);
 
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $admin->ruleName = $groupRule->name;
        $auth->add($admin);
        $auth->addChild($admin, $teacher);
 
        $superadmin = $auth->createRole('superadmin');
        $superadmin->description = 'Superadmin';
        $superadmin->ruleName = $groupRule->name;
        $auth->add($superadmin);
        $auth->addChild($superadmin, $admin);
 
        // Superadmin assignments
        if ($id !== null) {
            $auth->assign($superadmin, $id);
        }
    }
}