<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderedItem\OrderedItem */

$this->title = 'Update Ordered Item: ' . $model->ordered_id;
$this->params['breadcrumbs'][] = ['label' => 'Ordered Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ordered_id, 'url' => ['view', 'id' => $model->ordered_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordered-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
