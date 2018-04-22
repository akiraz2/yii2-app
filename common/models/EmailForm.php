<?php
/**
 * Copyright (c) 2018
 * cms Smetana
 * project: alt-money
 *
 */

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_form".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $setToName
 * @property string $setToEmail
 * @property string $subject
 * @property string $textBody
 * @property string $created_at
 * @property integer $status
 */
class EmailForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['textBody'], 'required'],
            [['textBody'], 'string'],  
            [['setToEmail','setFromEmail'], 'email'],
            [['setToName','setFromName', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'setToName' => 'Имя получателя',
            'setFromName' => 'Имя отправителя',
            'setToEmail' => 'Email получателя',
            'setFromEmail' => 'Email отправителя',
            'subject' => 'Тема',
            'textBody' => 'Сообщение',
            'created_at' => 'Дата создания',
            'status' => 'Статус',
        ];
    }
}
