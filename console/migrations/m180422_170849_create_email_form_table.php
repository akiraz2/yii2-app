<?php
namespace console\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `email_form`.
 */
class m180422_170849_create_email_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

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
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email_form}}');
    }
}
