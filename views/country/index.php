<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/21
 * Time: 10:34
 */
 use yii\helpers\Html;//前端基础模板类
 use yii\widgets\LinkPager;//前端分页类
 ?>
<!--
在这个场景里，Pagination 提供了为数据结果集分页的所有功能：

首先 Pagination 把 SELECT 的子查询 LIMIT 5 OFFSET 0 数据表示成第一页。 因此开头的五条数据会被取出并显示。
然后小部件 LinkPager 使用 Pagination::createUrl() 方法生成的 URL 去渲染翻页按钮。 URL 中包含必要的参数 page 才能查询不同的页面编号。
如果你点击按钮 “2”，将会发起一个路由为 country/index 的新请求。 Pagination 接收到 URL 中 的 page 参数把当前的页码设为 2。 新的数据库请求将会以 LIMIT 5 OFFSET 5 查询并显示。

-->
<h1>Countries</h1>
<ul>
    <?php foreach ($countries as $country):?>
        <li>
            <?= Html::encode("{$country->name}({$country->code})")?>
            <?= $country->population?>
        </li>
    <?php endforeach;?>
</ul>

<!--分页-->
<?= LinkPager::widget(['pagination'=>$pagination])?>