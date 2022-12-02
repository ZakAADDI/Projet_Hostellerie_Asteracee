<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'firstname' => 'gerant',
                'lastname' => 'gerant',
                'address' => '3 rue du test 74000 Test',
                'email' => 'gerant@gmail.com',
                'picture' => 'img',
                'gender' => 'female',
                'password' => Hash::make('gerant'),
                'role' => 1,
                'birth_date' => Carbon::createFromDate('1990','10','10'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'utilisateur1',
                'lastname' => 'utilisateur1',
                'address' => '3 rue du test 74000 Test',
                'email' => 'user1@gmail.com',
                'picture' => 'img',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role' => 0,
                'birth_date' => Carbon::createFromDate('1995','2','20'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];
        User::insert($datas);
    }
}
