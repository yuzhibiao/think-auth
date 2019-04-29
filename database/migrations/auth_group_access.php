<?php

use think\migration\Migrator;

class AuthGroupAccess extends Migrator
{
    private $tableName = 'auth_group_access';


    public function up()
    {
        $table = $this->table($this->tableName, array('engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci'));
        $table->setId(false)->setComment('权限分组表')
            ->addColumn('uid', 'integer', array('limit' => 11, 'null' => false, 'default' => 0, 'comment' => '用户ID'))
            ->addColumn('group_id', 'integer', array('limit' => 11, 'null' => false, 'comment' => '用户组ID'))
            ->addIndex(array('uid', 'group_id'), array('unique' => true, 'name' => 'uid_group_id'))
            ->addIndex(array('uid'))
            ->addIndex(array('group_id'))
            ->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
