<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
class Reviews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            [
                'section'=> json_encode([ "fr" => "Avis Clients","en" => "Customers Reviews"]),
                'content' => 'Week-end en famille. Bonne situation de l\'hôtel. Près de celui-ci il y a une place de jeux et un jardin.
                Personnel à l\'écoute. Petit déjeuner varié. Nous n\'avons pas vraiment testé la partie spa.
                Restaurants de qualité.',
                'title' => 'Week-end en famille',
                'score' => '5',
                'user_firstname' => 'Juliette',
                'user_lastname' => 'B.',
                'gender' => 'Female',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'section'=> json_encode([ "fr" => "Avis Clients","en" => "Customers Reviews"]),
                'content' => 'Je commenterai uniquement sur le volet Brasserie de cet établissement.
                Bonne table , cuisine créative et service impeccable. Un menu a42€ avec un grand choix permis la carte. Comportant entrée + plat+dessert ( sous forme de buffet ( grand choix de pâtisserie et salade de fruits)). Je conseille',
                'title' => 'Très bonne brasserie',
                'score' => '5',
                'user_firstname' => 'Catherine',
                'user_lastname' => 'C.',
                'gender' => 'Female',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'section'=> json_encode([ "fr" => "Avis Clients","en" => "Customers Reviews"]),
                'content' => 'Le cuisinier qui cuit les oeufs du petit déj devrait apprendre à sourire.
                Les assiettes sales du petit déj devraient être enlevées au fur et à mesure pour que le client n’ait pas une table encombrée
                Le local piscine couverte empeste le chlore ainsi que le couloir pour y arriver
                A part cela,nous avons été ravis de notre séjour!',
                'title' => 'Qq critiques',
                'score' => '4',
                'user_firstname' => 'Jules',
                'user_lastname' => 'A.',
                'gender' => 'Male',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'section'=> json_encode([ "fr" => "Avis Clients","en" => "Customers Reviews"]),
                'content' => 'Très beau cadre cependant il est désolant que certains employés de la sécurité fassent preuve d’impolitesse et de non professionnalisme à l’égard des clients.
                Étant donné le standing de l’établissement il est inadmissible que certains employés se comportent de cette manière',
                'title' => 'Employés de la sécurité impolis',
                'score' => '3',
                'user_firstname' => 'Mélanie',
                'user_lastname' => 'P.',
                'gender' => 'Female',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'section'=> json_encode([ "fr" => "Avis Clients","en" => "Customers Reviews"]),
                'content' => 'Meilleur emplacement d’Annecy Nous avions une chambre avec vue majestueuse sur le lac. . Personnel très attentionné. Restaurant d’un bon niveau et bon buffet au petit déjeuner. Nous y sommes restés 4 jours
                Cependant :
                Les chambres sont plutôt petites et mériteraient d’avoir une porte de séparation pour les WC et salle de bain qui donnent sur un petit couloir non fermé Directement ouvert sur les Chambres Donc peu d’intimité en couple.',
                'title' => 'Déçus par les chambres',
                'score' => '3',
                'user_firstname' => 'Arnaud',
                'user_lastname' => 'J.',
                'gender' => 'Male',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];
        Review::insert($datas);
    }
}
