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
                'firstname' => 'admin',
                'lastname' => 'admin',
                'name' => 'admin',
                'address' => '3 rue du test 74000 Test',
                'email' => 'admin@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('admin'),
                'role_id' => 1,
                'birth_date' => Carbon::createFromDate('1995','2','18')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Marc',
                'lastname' => 'ANDERSON',
                'name' => 'employee',
                'address' => '3 rue du test 74000 Test',
                'email' => 'gerant@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('gerant'),
                'role_id' => 3,
                'birth_date' => Carbon::createFromDate('1990','11','10')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Garance',
                'lastname' => 'DELACOURS',
                'name' => 'user',
                'address' => '3 rue de la Miss, 75000 Paris',
                'email' => 'g.delacours@gmail.com',
                'gender' => 'female',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1932','08','30')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Anthony',
                'lastname' => 'DA COSTA',
                'name' => 'user',
                'address' => '3 rue de la Miss, 75000 Paris',
                'email' => 'a.dacosta@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1991','02','10')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Michel',
                'lastname' => 'SURDOU',
                'name' => 'user',
                'address' => '6 rue de la Musique, 59000 Lille',
                'email' => 'm.dupont@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1958','08','29')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Mohamed',
                'lastname' => 'BENAHMED',
                'name' => 'user',
                'address' => '10 rue de la Castellane, 13000 Marseille',
                'email' => 'm.benahmed@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1972','06','23')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Marion',
                'lastname' => 'BALLEAR',
                'name' => 'user',
                'address' => '22 rue du Cinéma, 75000 Paris',
                'email' => 'm.ballear@gmail.com',
                'gender' => 'female',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1975','09','30')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Vanessa',
                'lastname' => 'PARAVENT',
                'name' => 'user',
                'address' => '96 rue de la Chanson, 75000 Paris',
                'email' => 'v.parvent@gmail.com',
                'gender' => 'female',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1972','12','22')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Saïd',
                'lastname' => 'TAGADI',
                'name' => 'user',
                'address' => '400 avenue des Victoires, 93000 Paris',
                'email' => 's.tagadi@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1973','07','19')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'firstname' => 'Charles',
                'lastname' => 'ARTISAN',
                'name' => 'user',
                'address' => '1 rue du Pays des Merveilles, 75000 Paris',
                'email' => 'c.artisan@gmail.com',
                'gender' => 'male',
                'password' => Hash::make('user'),
                'role_id' => 2,
                'birth_date' => Carbon::createFromDate('1924','05','22')->format('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        User::insert($datas);
    }
}
