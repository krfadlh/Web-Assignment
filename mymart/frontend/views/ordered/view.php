<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model common\models\Ordered\Ordered */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordereds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordered-view">

    <h1><?= Html::encode($this->title) ?></h1>
	

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'customer_id',
        ],
    ]) ?>
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ordered_id',
            'item_id',
			'items.nama',
			'items.price',
			'items.category_id',
			'items.photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
