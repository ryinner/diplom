<?php

namespace App\Migrations;

use Phinx\Migration\AbstractMigration;

class CreateTableHouses extends AbstractMigration
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
        $housesTable = $this->table('houses', ['id' => 'id']);

        $housesTable->addColumn('price', 'integer')
                        ->addColumn('description', 'string', ['limit' => 516])
                        ->addColumn('rooms', 'integer', ['limit' => 56])
                        ->addColumn('adress', 'string')
                        ->addColumn('square', 'integer')
                        ->addColumn('is_new','boolean')
                        ->addColumn('type_id', 'integer')->addForeignKey('type_id', 'types', 'id', ['delete'=>'cascade', 'update' => 'cascade'])
                        ->addColumn('status_id', 'integer')->addForeignKey('status_id', 'statuses', 'id', ['delete'=>'cascade', 'update' => 'cascade'])
                        ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                        ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                        ->create();
    }
}
