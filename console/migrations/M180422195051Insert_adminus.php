<?php

use yii\db\Migration;

/**
 * Class M180422195051Insert_adminus
 */
class M180422195051Insert_adminus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'adminus',
            'email' => 'admin@admin.ru',
            'password_hash' => '$2y$12$BJu3H91IIWNKhcmfK7QnkeUUB90FTEl4xb12cVvWAuV6dJXGho8JS',
            'auth_key' => 'vYghSpiPCeP60_jCLo9hIVrGlFUMY3xJ',
            'confirmed_at' => '1524426563',
            'created_at' => '1524426563',
            'updated_at' => '1524426563',
            'flags' => '0',
        ]);

        $this->insert('{{%profile}}', [
            'user_id' => '1'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['id' => 1]);
        $this->delete('{{%profile}}', ['id' => 1]);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M180422195051Insert_adminus cannot be reverted.\n";

        return false;
    }
    */
}
