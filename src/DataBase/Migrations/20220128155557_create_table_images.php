<?php

namespace App\Migrations;

use Phinx\Migration\AbstractMigration;

class CreateTableImages extends AbstractMigration
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
        $imagesTable = $this->table('images', ['id' => 'id']);

        $imagesTable->addColumn('path', 'string')
                        ->addColumn('alt', 'string', ['null' => true])
                        ->addColumn('house_id', 'integer')->addForeignKey('house_id', 'houses', 'id', ['delete'=>'cascade','update' => 'cascade'])
                        ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                        ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                        ->create();
    }
}
