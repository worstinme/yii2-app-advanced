<?php

use yii\db\Migration;

/**
 * Class m180214_071128_init_menu
 */
class m180214_071128_init_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey()->unsigned(),
            'app_id' => $this->string()->notNull(),
            'type' => $this->smallInteger(),
            'name' => $this->string()->notNull(),
            'menu' => $this->string()->notNull(),
            'params' => $this->text(),
            'parent_id'=>$this->integer()->unsigned(),
            'sort' => $this->integer(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
            'lang' => $this->string(),
        ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180214_071128_init_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180214_071128_init_menu cannot be reverted.\n";

        return false;
    }
    */
}
