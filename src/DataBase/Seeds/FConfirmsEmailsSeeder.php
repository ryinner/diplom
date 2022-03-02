<?php
namespace App\Seeds;

use Phinx\Seed\AbstractSeed;

class FConfirmsEmailsSeeder extends AbstractSeed
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
                'token'     => 'b6b99f3b34528e0b62ebc548c3bf5689213ca7542b82d03cf25c8f5e2738120e',
                'status'    => '1',
                'user_id'   => '1',
            ],
        ];

        $confirmsEmailsTable = $this->table('confirms_emails');
        $confirmsEmailsTable->insert($data)
                            ->saveData();
    }
}
