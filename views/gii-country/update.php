<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GiiCountry */

$this->title = 'Update Gii Country: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gii Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gii-country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
