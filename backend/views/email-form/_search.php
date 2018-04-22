<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmailFormSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'setToEmail') ?>

    <?= $form->field($model, 'setToName') ?>

    <?= $form->field($model, 'setFromEmail') ?>

    <?php // echo $form->field($model, 'setFromName') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'textBody') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'status_text') ?>

    <?php // echo $form->field($model, 'send_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
