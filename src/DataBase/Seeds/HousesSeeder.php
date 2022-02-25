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
                'description' => '<p>Квартира светлая, чистая и очень теплая, готова к заселению. В санузле необходим косметический ремонт.
                Очень хороший дом, в подъезде всегда чисто. Спокойные и приветливые соседи.</p>
                <p>В шаговой доступности:</p>
                <ul>
                    <li>Фитнес клуб</li>
                    <li>Детский сад №47</li>
                    <li>Салоны красоты</li>
                    <li>Остановки общественного транспорта</li>
                    <li>Продуктовые магазины</li>
                    <li>Сетевые магазины</li>
                    <li>Аптечные пункты</li>
                </ul>',
                'rooms' => '3',
                'adress' => 'ул. Горького, д. 3',
                'square' => '25',
                'is_new' => 1,
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
