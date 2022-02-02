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
            [
                'description' => '',
                'rooms' => '3',
                'adress' => 'Горького 34',
                'square' => '25',
                'is_new' => true,
                'type_id' => 1,
                'status_id' => 1,
                'user_id' => 1
            ]
        ];

        $housesTable = $this->table('houses');

        $housesTable->insert($data)
                        ->saveData();
    }
}
