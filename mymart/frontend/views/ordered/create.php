<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ordered\Ordered */

$this->title = 'Create Ordered';
$this->params['breadcrumbs'][] = ['label' => 'Ordereds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordered-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
