<?php
/*
 * 第一次使用模型
 * @author wfx
 * @datetime 2018.10.20 10:55
 * */
namespace app\models;
use Yii; //yii 容器对象
use yii\base\Model;//yii基础modal

/*
 *  yii\base\Model 被用于普通模型类的父类并与数据表无关。yii\db\ActiveRecord 通常是普通模型类的父类但与数据表有关联
 * （译注：yii\db\ActiveRecord 类其实也是继承自 yii\base\Model，增加了数据库处理）。
 * */

class EntryForm extends Model
{
    public $name;
    public $email;

    /*
     * 内置方法，用来校验model数据
     * EntryForm 类包含 name 和 email 两个公共成员， 用来储存用户输入的数据。它还包含一个名为 rules() 的方法， 用来返回数据验证规则的集合。
     * 上面声明的验证规则表示：name 和 email 值都是必须的
     * email 的值必须满足email规则验证
     * 如果你有一个处理用户提交数据的 EntryForm 对象， 你可以调用它的 validate() 方法触发数据验证。（该方法自动校验model里额度rules定义的规则）
     *  如果有数据验证失败，将把 hasErrors 属性设为 ture， 想要知道具体发生什么错误就调用 getErrors。
     * */
    public function rules()
    {
        return [
            [['name','email'],'required'],//name email 必须的，不能为空
            ['email','email'] //email 必须满足email规则
        ];
    }
}