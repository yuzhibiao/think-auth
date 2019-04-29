<?php

use think\migration\Migrator;

class AuthRule extends Migrator
{
    private $tableName = 'auth_rule';


    public function up()
    {
        $table = $this->table($this->tableName, array('engine' => 'InnoDB', 'collation' => 'utf8mb4_general_ci'));
        $table->setId('id')->setPrimaryKey('id')->setComment('节点表')
            ->addColumn('type', 'enum', array('values' => array('file', 'menu'), 'null' => false, 'default' => 'file', 'comment' => 'menu为菜单,file为权限节点'))
            ->addColumn('pid', 'integer', array('limit' => 11, 'null' => false, 'default' => 0, 'comment' => '父级ID'))
            ->addColumn('name', 'string', array('limit' => 100, 'null' => false, 'comment' => '规则名称'))
            ->addColumn('title', 'string', array('limit' => 50, 'null' => false, 'comment' => '规则标题'))
            ->addColumn('icon', 'string', array('limit' => 50, 'null' => true, 'default' => '', 'comment' => '图标'))
            ->addColumn('condition', 'string', array('limit' => 255, 'null' => true, 'default' => '', 'comment' => '规则附件条件,满足附加条件的规则,才认为是有效的规则'))
            ->addColumn('remark', 'string', array('limit' => 255, 'null' => true, 'default' => '', 'comment' => '备注'))
            ->addColumn('ismenu', 'integer', array('limit' => 1, 'null' => false, 'default' => 0, 'comment' => '是否菜单'))
            ->addColumn('weigh', 'integer', array('limit' => 11, 'null' => false, 'default' => 0, 'comment' => '权重'))
            ->addColumn('status', 'string', array('limit' => 30, 'null' => false, 'default' => '', 'comment' => '状态'))
            ->addIndex(array('name'), array('unique' => true, 'name' => 'name'))
            ->addIndex(array('pid'))
            ->addIndex(array('weigh'))
            ->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
