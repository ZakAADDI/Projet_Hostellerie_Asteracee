<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                'name' => 'adresse',
                'text' => '35 quai du lac, 74000 Annecy',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'téléphone',
                'text' => '04 56 56 56 56',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => 'email',
                'text' => 'contact@hostellerie-asteracee.fr',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
            ];
            Contact::insert($datas);
    }
}
