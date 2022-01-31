<?php
namespace App\Seeds;

use Phinx\Seed\AbstractSeed;

class HousesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [

        ];

        $housesTable = $this->table('houses');

        $housesTable->insert($data)
                        ->saveData();
    }
}
