<?php
namespace App\Seeds;

use Phinx\Seed\AbstractSeed;

class BUsersSeeder extends AbstractSeed
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
                'username'     => 'admin',
                'email'        => 'login@email.ry',
                'password'     => '$2y$10$JJE0T6vRlqyV3cvVXwO5keG.HoYtSl5fzDwvhe7lvMJhiSaIX6eFy',
                'first_name'   => 'Админ',
                'last_name'    => 'Админских',
                'phone'        => '89078765763',
                'role_id'      => '3'
            ],
        ];

        $usersTable = $this->table('users');
        $usersTable->insert($data)
                    ->saveData();
    }
}
