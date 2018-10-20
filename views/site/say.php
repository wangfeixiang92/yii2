<?php
/**
 * 第一次问候
 * @author wfx
 * @datetime 2018-10-20
 * */
use yii\helpers\Html;

?>
<!--
say 视图应该存为 views/site/say.php 文件。当一个操作中调用了 render() 方法时， 它将会按 views/控制器 ID/视图名.php 路径加载 PHP 文件。

注意以上代码，message 参数在输出之前被 HTML-encoded 方法处理过。 这很有必要，当参数来自于最终用户时，参数中可能隐含的恶意 JavaScript 代码会导致 跨站脚本（XSS）攻击。

当然了，你大概会在 say 视图里放入更多内容。内容可以由 HTML 标签，纯文本， 甚至 PHP 语句组成。实际上 say 视图就是一个由 render() 执行的 PHP 脚本。 视图脚本输出的内容将会作为响应结果返回给应用。应用将依次输出结果给最终用户。

 新页面和其它页面使用同样的头部和尾部是因为 render() 方法会自动把 say 视图执行的结果嵌入称为布局的文件中， 本例中是 views/layouts/main.php。
-->
<?= html::encode($message)?>