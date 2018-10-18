<?php
/**
 *  yii2 框架描述控制器
 * @author wfx
 * @datetime 2018-10-18 22:26
 * @describe 该控制器的作用是用来学习框架做笔记使用的
 * @directoryStructure =>yii2目录结构
 * */
    //yii2目录结构
error_reporting(E_ALL &  ~E_NOTICE);

class  Describe {
    //定义所有方法
    public $describeKeys=array(
        'directoryStructure'=>array('label'=>'框架目录结构','describe'=>'')
    );
    //目录结构
    public function directoryStructure(){

        return
        '
        basic/                  应用根目录
        composer.json       Composer 配置文件, 描述包信息
        config/             包含应用配置及其它配置
            console.php     控制台应用配置信息
            web.php         Web 应用配置信息
        commands/           包含控制台命令类
        controllers/        包含控制器类
        models/             包含模型类
        runtime/            包含 Yii 在运行时生成的文件，例如日志和缓存文件
        vendor/             包含已经安装的 Composer 包，包括 Yii 框架自身
        views/              包含视图文件
        web/                Web 应用根目录，包含 Web 入口文件
            assets/         包含 Yii 发布的资源文件（javascript 和 css）
            index.php       应用入口文件
        yii                 Yii 控制台命令执行脚本
';
    }

    //404
    public function  __call($name, $arguments)
    {
        die('【'.$name.'】方法不存在') ;
    }

    //输出方法
    public function show($action)
    {
        $this->describeKeys[$action]['describe']=call_user_func(array('Describe',$action));
        $lable = $this->describeKeys[$action]['label'];
        $describe = $this->describeKeys[$action]['describe'];
        echo <<<show
        <label>{$lable}</label>
        <textarea style="width: 100%;height: 100%;">{$describe}</textarea>
show;
    }
}

//调用
if($_GET['look']){
    (new Describe())->show($_GET['look']);
}else{
    $describeKeys =  (new Describe())->describeKeys;
     $str='<ol>';
    foreach ($describeKeys as $key=>$v)
    {
        $str .= '<li><a href=describe.php?look='.$key.'>'.$v['label'].'</a></li>';
    }
    echo $str.'</ol>';
}
