<?php
//第一次表单调教
namespace app\controllers;


use app\models\Country;
/**
*  第一次使用数据库
*  创建一个country 活动记录模型表示一个表
*  在控制器里可以直接使用
* */

use Yii;//使用$app 容器
use yii\data\Pagination;
use yii\web\Controller;


class CountryController extends Controller{

    /* 测试创建活动记录
     * 活动记录是面向对象、功能强大的访问和操作数据库数据的方式。
     * 你可以在活动记录章节了解更多信息。
     *  除此之外你还可以使用另一种更原生的被称做数据访问对象的方法操作数据库数据。
     * */
    public function actionTest()
    {
        // 获取 country 表的所有行并以 name 排序
        $countries = Country::find()->orderBy('name')->all();
//        echo '<pre>';
//        print_r($countries);
//        echo '</pre>';
        // 获取主键为 “US” 的行
        $country = Country::findOne('US');

        // 输出 “United States”
        echo $country->name;

        // 修改 name 为 “U.S.A.” 并在数据库中保存更改
        $country->name='U.S.A';
        $country->save();
    }

    /**
     *  创建动作
     * 为了向最终用户显示国家数据，你需要创建一个操作。相比之前小节掌握的在 site 控制器中创建操作，
     * 在这里为所有和国家有关的数据新建一个控制器更加合理。 新控制器名为 CountryController，并在其中创建一个 index 操作， 如
     *
     * index 操作调用了活动记录 Country::find() 方法，去生成查询语句并从 country 表中取回所有数据。
     * 为了限定每个请求所返回的国家数量，查询在 yii\data\Pagination 对象的帮助下进行分页。 Pagination 对象的使命主要有两点：
     *
     *  为 SQL 查询语句设置 offset 和 limit 从句， 确保每个请求只需返回一页数据（本例中每页是 5 行）。
     *  在视图中显示一个由页码列表组成的分页器， 这点将在后面的段落中解释。在代码末尾，index 操作渲染一个名为 index 的视图， 并传递国家数据和分页信息进去。
     * */
    public function actionIndex()
    {
        //实例化model  ===>数处对象
        $country = Country::find();
        //实例化分页组件   ===> 分页组件对象
        $pagination = new Pagination([
            'defaultPageSize'=>5, //默认分页数
            'totalCount'=>$country->count()
        ]);
        //获取数据数组对象
        $countries = $country->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        //var_dump($countries);
        return $this->render('index',[
            'countries'=>$countries,
            'pagination'=>$pagination
        ]);
    }
}