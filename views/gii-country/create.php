<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GiiCountry */

$this->title = 'Create Gii Country';
$this->params['breadcrumbs'][] = ['label' => 'Gii Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gii-country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
