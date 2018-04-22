<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Email Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'setToEmail:email',
            //'setToName',
            'setFromEmail:email',
            //'setFromName',
            'subject',
            [
                'attribute' => 'textBody',
                'value' => function ($model) {
                    return \yii\helpers\StringHelper::truncate($model->textBody, 25);
                }
            ],
            'status',
            'created_at',
            // 'status_text:ntext',
            // 'send_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
