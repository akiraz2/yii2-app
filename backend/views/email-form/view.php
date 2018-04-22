<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmailForm */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Email Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app-forms', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app-forms', 'Delete'), ['delete', 'id' => $model->id], [
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
            'user_id',
            'setToEmail:email',
            'setToName',
            'setFromEmail:email',
            'setFromName',
            'subject',
            'textBody:ntext',
            'status',
            'created_at',
            'status_text:ntext',
            'send_at',
        ],
    ]) ?>

</div>
