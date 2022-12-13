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
                'name' => 'employee',
                'address' => '3 rue du test 74000 Test',
                'email' => 'gerant@gmail.com',
                'gender' => 'female',
                'password' => Hash::make('gerant'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1990','11','10')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'utilisateur1',
                'lastname' => 'utilisateur1',
                'name' => 'user',
                'address' => '3 rue du test 74000 Test',
                'email' => 'user1@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1995','2','20')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'firstname' => 'admin',
                'lastname' => 'admin',
                'name' => 'admin',
                'address' => '3 rue du test 74000 Test',
                'email' => 'admin@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('admin'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1995','2','18')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];
        User::insert($datas);
    }
}
