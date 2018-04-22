<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

namespace backend\controllers;

use backend\components\AdminAccessControl;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use dektrium\user\filters\AccessRule;
use yii\filters\AccessControl;

class BaseAdminController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AdminAccessControl::class,
            ],
        ];
    }
}
