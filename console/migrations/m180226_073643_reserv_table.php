<?php

use yii\db\Migration;

/**
 * Class m180226_073643_reserv_table
 */
class m180226_073643_reserv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reserv}}', [
            'id' => $this->primaryKey()->unsigned(),
            'email' => $this->string(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'booking_date' => $this->string(),
            'restoran' => $this->string(),
            'comment' => $this->text(),
            'state'=>$this->smallInteger(2)->unsigned(),
            'created_at' => $this->integer()->notNull()->unsigned(),
            'updated_at' => $this->integer()->notNull()->unsigned(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180226_073643_reserv_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180226_073643_reserv_table cannot be reverted.\n";

        return false;
    }
    */
}
