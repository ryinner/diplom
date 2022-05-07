<?php
namespace App\Seeds;

use Phinx\Seed\AbstractSeed;

class DStatusesSeeder extends AbstractSeed
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
                'status' => 'Продается'
            ],
            [
                'status' => 'В аренду'
            ],
            [
                'status' => 'Закрыто'
            ],
            [
                'status' => 'В работе'
            ],
            [
                'status' => 'Принято'
            ],
            [
                'status' => 'Отклонено'
            ]
        ];

        $statysesTable = $this->table('statuses');
        $statysesTable->insert($data)
                        ->saveData();
    }
}
