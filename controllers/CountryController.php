<?php
//第一次表单调教
namespace app\controllers;


use app\models\Country;
use Yii;//使用$app 容器
use yii\web\Controller;
/*
 *  第一次使用数据库
 *  创建一个country 活动记录模型表示一个表
 *  在控制器里可以直接使用
 * */

class CountryController extends Controller{

    /* 创建活动记录
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
}