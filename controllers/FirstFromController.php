<?php
//第一次表单调教
namespace app\controllers;

use app\models\EntryForm;
use Yii;//使用$app 容器
use yii\web\Controller;


class FirstFromController extends Controller{


        //第一次访问
        public function actionFirstFrom()
        {
            $entry = new EntryForm();
            $entry->name = '666';
            $entry->email ='wfx';
            $result = $entry->validate();
            //var_dump($result); ====> false
            //var_dump($entry->hasErrors());===>true
            if($result){
                exit('验证成功');
            }else{
                var_dump($entry->getErrors());
                exit;
            }
        }


            //demo 第一次访问
            public function actionEntry()
            {
                //Yii::$app --> Yii对象
                //Yii::$app->request  --->路由的对象
                //Yii::$app->request->post()  获取post里的数据

                /*
                 * 该操作首先创建了一个 EntryForm 对象。
                 * 然后尝试从 $_POST 搜集用户提交的数据，load() 方法负责 把post里的数据赋予model对象的属性
                 *  由 Yii 的 yii\web\Request::post() 方法负责搜集。
                 *  如果模型被成功填充数据（也就是说用户已经提交了 HTML 表单）， 操作将调用 validate() 去确保用户提交的是有效数据。
                 *
                 * */

                /**
                 *  表达式 Yii::$app 代表应用实例，它是一个全局可访问的单例。
                 *  同时它也是一个服务定位器， 能提供 request，response，db 等等特定功能的组件。
                 *  在上面的代码里就是使用 request 组件来访问应用实例收到的 $_POST 数据。
                 *  在这个简单例子里我们只是呈现了有效数据的确认页面。
                 *  实践中你应该考虑使用 refresh() 或 redirect() 去避免表单重复提交问题。
                 */

                $model = new EntryForm();
                if($model->load(Yii::$app->request->post()) && $model->validate()){
                    //验证通过
                    return $this->render('entry-confirm', ['model' => $model]);
                }else{

                    return $this->render('entry',['model'=>$model]);
                }

            }


}