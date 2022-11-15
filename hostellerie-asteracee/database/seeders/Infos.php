<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;
class Infos extends Seeder
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
                'title_fr' => 'La Piscine d\'hiver',
                'title_en' => 'Winter\'s Pool',
                'content_fr' => 'Pour toujours plus de confort et de détente, votre Hostellerie de  l\’Astéracée est heureuse de vous annoncer l\’ouverture des portes de sa piscine d’Hiver. Les travaux de rénovation ont duré 6 semaines, nous nous ferons une joie de vous accueillir dans ce lieu qui répondra à toutes vos attentes.',
                'content_en' => 'For even more comfort and relaxation, your Hostellerie de l\'Astéracée is pleased to announce the opening of the doors of its winter swimming pool. The renovation work lasted 6 weeks, we will be happy to welcome you to this place which will meet all your expectations.',
                'media_id' => '11',
                'publication_date' => '20/09/2022',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title_fr' => 'La carte des menus',
                'title_en' => 'Menu Card',
                'content_fr' => 'Notre carte évolue et nos plats aussi ! L’Hostellerie de l’Astéracée a changé certains de ses fournisseurs. Désormais, nous travaillons uniquement avec des produits frais, locaux et de saison. Notre chef étoilé et son équipe s’efforcent de toujours vous offrir une expérience culinaire d’exception.',
                'content_en' => 'Our menu is changing and our dishes too! The Hostellerie de l\'Asteraceae has changed some of its suppliers. From now on, we only work with fresh, local and seasonal products. Our starred chef and his team strive to always offer you an exceptional culinary experience.',
                'media_id' => '12',
                'publication_date' => '02/11/2022',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];
        Info::insert($datas);
    }
}