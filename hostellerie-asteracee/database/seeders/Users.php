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
            'name' => 'gerant',
            'email' => 'gerant@gmail.com',
            'password' => Hash::make('gerant')
        ];
        User::insert($datas);
    }
}
