<?php

use yii\db\Schema;
use yii\db\Migration;

class m180430_141650_cache extends \dektrium\user\migrations\Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->createTable('{{%cache}}',[
            'id'=> $this->char(128)->notNull(),
            'expire'=> $this->integer(11)->null()->defaultValue(null),
            'data'=> $this->binary()->null()->defaultValue(null),
        ], $this->tableOptions);

        $this->addPrimaryKey('pk_on_cache','{{%cache}}',['id']);
    }

    public function safeDown()
    {
            $this->dropPrimaryKey('pk_on_cache','{{%cache}}');
            $this->dropTable('{{%cache}}');
    }
}
