<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
     *   第一次问候
     *
     *  Yii 使用 action 前缀区分普通方法和操作。 action 前缀后面的名称被映射为操作的 ID。
     *  涉及到给操作命名时，你应该理解 Yii 如何处理操作 ID。 操作 ID 总是被以小写处理，如果一个操作 ID 由多个单词组成， 单词之间将由连字符连接（如 create-comment）。
     *  操作 ID 映射为方法名时移除了连字符，将每个单词首      字母大写，并加上 action 前缀。 例子：操作 ID create-comment 相当于方法名 actionCreateComment。
     *  上述代码中的操作方法接受一个参数 $message， 它的默认值是 “Hello Yii2”（就像你设置 PHP 中其它函数或方法的默认值一样）。 当应用接收到请求并确定由 say 操作来响应请求时，应用将从请求的参数中寻找对应值传入     *  进来。换句话说，如果请求包含一个 message 参数， 它的值是 “Goodbye”， 操作方法中的 $message 变量也将被填充为 “Goodbye”。
     *  在操作方法中，render() 被用来渲染一个 名为 say 的视图文件。 message 参数也被传入视图，这样就可以在里面使用。操作方法会返回渲染结果。 结果会被应用接收并显示给最终用户的浏览器（作为整页 HTML 的一部分）。
     *  say 视图应该存为 views/site/say.php 文件。当一个操作中调用了 render() 方法时， 它将会按 views/控制器 ID/视图名.php 路径加载 PHP 文件。视图文件不存在，会报文件不存在的错误
     *
     * URL:http://yii.com/index.php?r=site/say&message=hello,word
     * 上面 URL 中的参数 r 需要更多解释。 它代表路由，是整个应用级的， 指向特定操作的独立 ID。路由格式是 控制器 ID/操作 ID。应用接受请求的时候会检查参数， 使用控制器 ID 去确定哪个控制器应该被用来处理请求。
     *  然后相应控制器将使用操作 ID 去确定哪个操作方法将被用来做具体工作。 上述例子中，路由 site/say 将被解析至 SiteController 控制器和其中的 say 操作。 因此 SiteController::actionSay() 方法将被调用处理请求。
     * 与操作一样，一个应用中控制器同样有唯一的 ID。 控制器 ID 和操作 ID 使用同样的命名规则。 控制器的类名源自于控制器 ID， 移除了连字符，每个单词首字母大写，并加上 Controller 后缀。
     *  例子：控制器 ID post-comment 相当于控制器类名 PostCommentController。
     * 通俗的讲就是  http://www.xxx.com?r=my-first/first-show => MyFirstController 里的action FirstShow
     */
        public function  actionSay($message='Hello Yii2')
        {
            return $this->render('say',['message'=>$message]);
        }



}
