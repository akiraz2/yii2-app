<?php

use yii\db\Migration;

/**
 * Handles the creation of table `email_form`.
 */
class m180422_170849_create_email_form_table extends \dektrium\user\migrations\Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email_form}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'setToEmail' => $this->string(100),
            'setToName' => $this->string(100),
            'setFromEmail' => $this->string(100),
            'setFromName' => $this->string(100),
            'subject' => $this->string(255),
            'textBody' => $this->text()->notNull(),
            'status' => $this->tinyInteger(4)->defaultValue(0),
            'created_at' => $this->timestamp(),
            'status_text' => $this->text(),
            'send_at' => $this->dateTime()
        ], $this->tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email_form}}');
    }
}
