<?php

use think\migration\Migrator;

class User extends Migrator
{
    private $tableName = 'user';


    public function up()
    {
        $table = $this->table($this->tableName, array('engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci'));
        $table->setId('id')->setPrimaryKey('id')->setComment('后台用户表')
            ->addColumn('username', 'string', array('limit' => 20, 'null' => false, 'comment' => '用户名'))
            ->addColumn('password', 'string', array('limit' => 50, 'null' => false, 'comment' => '密码'))
            ->addColumn('salt', 'string', array('limit' => 30, 'null' => true, 'default' => '', 'comment' => '密码key'))
            ->addIndex(array('username'), array('unique' => true, 'name' => 'uniq_username'))
            ->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
