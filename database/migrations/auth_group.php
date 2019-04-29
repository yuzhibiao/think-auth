<?php

use think\migration\Migrator;

class AuthGroup extends Migrator
{
    private $tableName = 'auth_group';


    public function up()
    {
        $table = $this->table($this->tableName, array('engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci'));
        $table->setId('id')->setPrimaryKey('id')->setComment('后台用户组表')
            ->addColumn('pid', 'integer', array('limit' => 11, 'null' => false, 'default' => 0, 'comment' => '父级组'))
            ->addColumn('name', 'string', array('limit' => 100, 'null' => false, 'comment' => '名称'))
            ->addColumn('description', 'string', array('limit' => 80, 'null' => true, 'default' => '', 'comment' => '描述'))
            ->addColumn('rules', 'text', array('null' => true, 'comment' => '规则ID'))
            ->addColumn('status', 'string', array('limit' => 30, 'null' => false, 'default' => '', 'comment' => '状态'))
            ->addColumn('creator', 'string', array('limit' => 20, 'null' => true, 'default' => '', 'comment' => '创建人'))
            ->addColumn('lastoperator', 'string', array('limit' => 20, 'null' => true, 'default' => '', 'comment' => '最后操作人'))
            ->addColumn('createtime', 'integer', array('limit' => 10, 'null' => true, 'comment' => '创建时间'))
            ->addColumn('updatetime', 'integer', array('limit' => 10, 'null' => true, 'comment' => '更新时间'))
            ->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
