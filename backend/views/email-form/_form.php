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
/* @var $model common\models\EmailForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'setToEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setToName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setFromEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setFromName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'textBody')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
