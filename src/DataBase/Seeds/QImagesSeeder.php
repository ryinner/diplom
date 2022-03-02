<?php
namespace App\Seeds;

use Phinx\Seed\AbstractSeed;

class QImagesSeeder extends AbstractSeed
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
                'path'   => 'picture1.jpg',
                'house_id' => '1'
            ],
            [
                'path'   => 'picture2.jpg',
                'house_id' => '1'
            ],
            [
                'path'   => 'picture3.jpg',
                'house_id' => '1'
            ],
            [
                'path'   => 'picture4.jpg',
                'house_id' => '2'
            ],
            [
                'path'   => 'picture5.jpg',
                'house_id' => '2'
            ],
            [
                'path'   => 'picture6.jpg',
                'house_id' => '2'
            ],
            [
                'path'   => 'picture7.jpg',
                'house_id' => '3'
            ],
            [
                'path'   => 'picture8.jpg',
                'house_id' => '3'
            ],
            [
                'path'   => 'picture9.jpg',
                'house_id' => '4'
            ],
            [
                'path'   => 'picture10.jpg',
                'house_id' => '4'
            ],
            [
                'path'   => 'picture11.jpg',
                'house_id' => '5'
            ],
            [
                'path'   => 'picture12.jpg',
                'house_id' => '5'
            ],
            [
                'path'   => 'picture13.jpg',
                'house_id' => '6'
            ],
            [
                'path'   => 'picture14.jpg',
                'house_id' => '6'
            ],
        ];

        $this->table('images')
                ->insert($data)
                ->saveData();
    }
}
