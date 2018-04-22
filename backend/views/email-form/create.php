<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmailForm */

$this->title = 'Create Email Form';
$this->params['breadcrumbs'][] = ['label' => 'Email Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
