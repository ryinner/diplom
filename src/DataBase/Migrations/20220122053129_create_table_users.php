<?php

namespace App\Migrations;

use Phinx\Migration\AbstractMigration;

class CreateTableUsers extends AbstractMigration
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
        $userTable = $this->table('users', ['id' => 'id']);

        $userTable->addColumn('username', 'string', ['limit' => 60])
                    ->addColumn('email', 'string', ['limit' => 120])
                    ->addColumn('password', 'string', ['limit' => 50])
                    ->addColumn('first_name', 'string', ['limit' => 50])
                    ->addColumn('last_name', 'string', ['limit' => 50])
                    ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                    ->addColumn('updated_at', 'timestamp', ['null' => true])
                    ->create();
    }
}
