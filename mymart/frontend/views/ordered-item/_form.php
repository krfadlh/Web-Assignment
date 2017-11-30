<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderedItem\OrderedItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordered-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordered_id')->textInput() ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
