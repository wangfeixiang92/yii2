<?php
//第一次使用数据库
namespace app\models;

use yii\db\ActiveRecord;//基础活动记录模型类  子类继承后可以直接被Yii查看数据库对应的表
/*
 * 创建一个country 活动记录模型 去代表和读取 country 表的数据。
 * 这个 Country 类继承自 yii\db\ActiveRecord。你不用在里面写任何代码。
 *  只需要像现在这样，Yii 就能根据类名去猜测对应的数据表名。
 *  如果类名和数据表名不能直接对应， 可以覆写 tableName() 方法去显式指定相关表名。
 */
class Country extends ActiveRecord{

}