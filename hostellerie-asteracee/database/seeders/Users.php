<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'first_name' => 'gerant',
                'last_name' => 'gerant',
                'address' => '3 rue du test 74000 Test',
                'email' => 'gerant@gmail.com',
                'password' => Hash::make('gerant'),
                'role' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'first_name' => 'utilisateur1',
                'last_name' => 'utilisateur1',
                'address' => '3 rue du test 74000 Test',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('user'),
                'role' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];
        User::insert($datas);
    }
}
