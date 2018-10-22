<?php
//应用组件
namespace app\controllers;




use Yii;
use yii\web\Controller;


class AppComponentsController extends Controller{

        //应用组件
        public function actionIndex()
        {

            echo '<pre>';
                echo '
                
                应用主体是服务定位器， 它部署一组提供各种不同功能的 应用组件 来处理请求。 例如，urlManager组件负责处理网页请求路由到对应的控制器。 db组件提供数据库相关服务等等。

                在同一个应用中，每个应用组件都有一个独一无二的 ID 用来区分其他应用组件， 你可以通过如下表达式访问应用组件。
                
                \Yii::$app->componentID
                
                第一次使用以上表达式时候会创建应用组件实例， 后续再访问会返回此实例，无需再次创建。

                应用组件可以是任意对象，可以在 应用主体配置配置 yii\base\Application::$components 属性。 例如：
                
                /*
                
                    [
                        \'components\' => [
                            // 使用类名注册 "cache" 组件
                            \'cache\' => \'yii\caching\ApcCache\',
                    
                            // 使用配置数组注册 "db" 组件
                            \'db\' => [
                                \'class\' => \'yii\db\Connection\',
                                \'dsn\' => \'mysql:host=localhost;dbname=demo\',
                                \'username\' => \'root\',
                                \'password\' => \'\',
                            ],
                    
                            // 使用函数注册"search" 组件
                            \'search\' => function () {
                                return new app\components\SolrService;
                            },
                        ],
                    ]
                    请谨慎注册太多应用组件， 应用组件就像全局变量， 使用太多可能加大测试和维护的难度。 一般情况下可以在需要时再创建本地组件。
                */
                ';
            echo'</pre>';
            

        }

    //引导组件
    public function actionLoad()
    {

        echo '<pre>';
        echo '
                
            上面提到一个应用组件只会在第一次访问时实例化， 如果处理请求过程没有访问的话就不实例化。 有时你想在每个请求处理过程都实例化某个组件即便它不会被访问， 可以将该组件ID加入到应用主体的 bootstrap 属性中。

            你还可以使用闭包来引导启动自定义的组件。不需要直接返回一个实例化的组件。 在应用主体 yii\base\Application 实例化后，闭包也会被调用。
            
            例如, 如下的应用主体配置保证了 log 组件一直被加载。
            
            [
            \'bootstrap\' => [
                \'log\',
                function($app){
                    return new ComponentX();
                },
                function($app){
                    // 可以写自定义的代码
                   return;
                }
            ],
            \'components\' => [
                \'log\' => [
                    // "log" 组件的配置
                ],
            ],
        ]
                
           ';
        echo'</pre>';

    }

    //核心组件
    public function actionkernel()
    {

        echo '<pre>';
        echo '
                
         Yii 定义了一组固定ID和默认配置的 核心 组件， 例如 request 组件 用来收集用户请求并解析 路由； db 代表一个可以执行数据库操作的数据库连接。 通过这些组件，Yii应用主体能处理用户请求。

         下面是预定义的核心应用组件列表， 可以和普通应用组件一样配置和自定义它们。 当你配置一个核心组件，不指定它的类名的话就会使用Yii默认指定的类。
                
           ';
        echo'</pre>';

    }



}