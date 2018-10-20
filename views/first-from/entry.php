<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/20
 * Time: 11:49
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!--
    视图使用了一个功能强大的小部件 ActiveForm 去生成 HTML 表单。
    其中的 begin() 和 end() 分别用来渲染表单的开始和关闭标签。
    在这两个方法之间使用了 field() 方法去创建输入框。
    第一个输入框用于 “name”，第二个输入框用于 “email”。
    之后使用 yii\helpers\Html::submitButton() 方法生成提交按钮。
    输入框的文字标签是 field() 方法生成的，内容就是模型中该数据的属性名。 例如模型中的 name 属性生成的标签就是 Name。

    你可以在视图中自定义->label标签 按如下方法：

    信息： Yii 提供了相当多类似的小部件去帮你生成复杂且动态的视图。 在后面你还会了解到自己写小部件是多么简单。 你可能会把自己的很多视图代码转化成小部件以提高重用，加快开发效率。
-->
<?php $form = ActiveForm::begin();?>

<?= $form->field($model,'name')->label('姓名')?>

<?= $form->field($model,'email')->label('邮箱')?>

<div class="form-group">
    <?=  Html::submitButton('submit',['btn btn-primary'])?>
</div>

<?php ActiveForm::end();?>