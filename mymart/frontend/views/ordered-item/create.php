<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderedItem\OrderedItem */

$this->title = 'Create Ordered Item';
$this->params['breadcrumbs'][] = ['label' => 'Ordered Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordered-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
