<?php

namespace App\Migrations;

use Phinx\Migration\AbstractMigration;

class CreateTableUsersRememberTokens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $usersRemembersTokens = $this->table('users_remember_tokens', ['id' => 'id', 'key' =>['token', 'user_id']]);

        $usersRemembersTokens->addColumn('user_id','integer')
                                ->addForeignKey('user_id','users','id',['delete'=>'cascade','update' => 'cascade'])
                                ->addColumn('token', 'string')
                                ->addColumn('ip', 'string', ['limit'=> 18])
                                ->addColumn('user_agent', 'string')
                                ->addColumn('expired_at', 'timestamp')
                                ->addColumn('created_at', 'timestamp')
                                ->addColumn('updated_at', 'timestamp')
                                ->create();
    }
}
