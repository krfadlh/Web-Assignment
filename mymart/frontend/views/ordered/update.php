<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ordered\Ordered */

$this->title = 'Update Ordered: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordereds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordered-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
