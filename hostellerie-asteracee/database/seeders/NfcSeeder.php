<?php

namespace Database\Seeders;

use App\Models\Nfc;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NfcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            // Juillet
            //1
            [
                'hash' => '12b637dd6a40e81118a123a7dde7d54c584569c273c31ed71ef33fcaa373112a',
                'booking_id' => 1,
                'ended_at' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '01', '14', '23', '59', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //2
            [
                'hash' => '110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db',
                'booking_id' => 1,
                'ended_at' => Carbon::createFromDate('2023', '07', '05')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '01', '14', '25', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //3
            [
                'hash' => '4321a844ee760ee6ca5575a7c16c34d2a40ec1b3d76003681b8a3848dc1f4cc5',
                'booking_id' => 2,
                'ended_at' => Carbon::createFromDate('2023', '07', '08')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '03', '18', '19', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //4
            [
                'hash' => '3286dd680559f74409c1b4011b48a22827652bfa1b7946e36d588a03f2914ce5',
                'booking_id' => 3,
                'ended_at' => Carbon::createFromDate('2023', '07', '10')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '05', '11', '24', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //5
            [
                'hash' => '06a77e7a22ab08f783439d002929b8f493014463ab6a1fe651401813bfd9c225',
                'booking_id' => 4,
                'ended_at' => Carbon::createFromDate('2023', '07', '12')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '07', '11', '03', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //6
            [
                'hash' => 'e9a25df0aec0c8fc9dd044ae20f769edcaabe7d1d24feb28c8f84277512a6986',
                'booking_id' => 5,
                'ended_at' => Carbon::createFromDate('2022', '07', '14')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '09', '16', '12', '11', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //7
            [
                'hash' => '66f0ae8539426fd3e8afceb17ba5863eeaa45fc676c3b98234363f54c85ab822',
                'booking_id' => 6,
                'ended_at' => Carbon::createFromDate('2023', '07', '16')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '11', '19', '19', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //8
            [
                'hash' => '0f0557b657bb755314b81ecd7258fc974fdefc7b755f9a17cde4f15f54520850',
                'booking_id' => 7,
                'ended_at' => Carbon::createFromDate('2023', '07', '18')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '13', '14', '28', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //9
            [
                'hash' => 'ed7b6ce84d9f2b5cf0c4012eb39990566810708ea37d8402d809f7f40b15443f',
                'booking_id' => 8,
                'ended_at' => Carbon::createFromDate('2023', '07', '20')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '15', '14', '27', '08', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //10
            [
                'hash' => 'db0816fc4bb80f0bf818c85fd3c551616460dfab2814c6fb65fb5e8460ed55d9',
                'booking_id' => 9,
                'ended_at' => Carbon::createFromDate('2023', '07', '22')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '17', '20', '12', '10', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //11
            [
                'hash' => '0ee77139c7aa78448e1af714462a804a52720608edf3193f90d5632ff0bfcf8c',
                'booking_id' => 10,
                'ended_at' => Carbon::createFromDate('2023', '07', '24')->format('Y-m-d'),
                'created_at' => Carbon::create('2023', '07', '19', '23', '14', '55', 'Europe/Paris')->format('Y-m-d H:i:s'),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //12
            [
                'hash' => 'c7cd05f968202e41ab42df96ff4313f0198a58220a347601f11e7573bc3a075d',
                'booking_id' => 11,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //13
            [
                'hash' => 'cd3532b0298d34f672891830310445787fb8b2107e8a0e423be08f4f68dcb6b9',
                'booking_id' => 12,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //14
            [
                'hash' => '6e98ac963c5742d5a8126e3703591e06abdba335d4299a1a5572e0fbb72e0e2b',
                'booking_id' => 13,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //15
            [
                'hash' => '082bdf3987f146e925d2baaca78694371e4a56ddd4a82ea1bbdd0578c048691f',
                'booking_id' => 14,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //16
            [
                'hash' => '5719637e9346470598b2053bfcdd1f38c61db371f819d89680d9d3c24e1be445',
                'booking_id' => 15,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //17
            [
                'hash' => '6c2914edc53c9398803cfc262bb35dc767ef305a219a1bb0f051355fa2ffd0f5',
                'booking_id' => 16,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //18
            [
                'hash' => 'e544b9b9d0075e26a6c52e86401ed4cfc04f99087989cfe3eda26ea4e3e48401',
                'booking_id' => 17,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //19
            [
                'hash' => 'c71ef46fee60b45d0f935a0ae5222dc57ba55a1494ece1fd205d8a7de3958815',
                'booking_id' => 18,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //20
            [
                'hash' => '02a25a7e6d6d1d529299ff7801299d84acb5ebc89e93f3f0489878feab68d89c',
                'booking_id' => 19,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //21
            [
                'hash' => '40f160e34ae9948cbf6d950b23994464754b1a16f1aec73914b007ae1f121177',
                'booking_id' => 20,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //22
            [
                'hash' => 'f03df3985cf3954b4b09b1c9787692a5bfb5a925e11c6b58b44944e812138c00',
                'booking_id' => 21,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //23
            [
                'hash' => 'e484cbe7a1813e10ce6424ff359b01a7f59187c9010155532ee0a13eafe9b1a9',
                'booking_id' => 22,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //24
            [
                'hash' => 'fe2b901d05fd22e85e101c8042f6c06ad4ec664b41bf4ce17edcd0ce3708df23',
                'booking_id' => 23,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //25
            [
                'hash' => '485593becdd1e6dccdba4bed740bd8f425a34666541d04e19c9567bb62c12124',
                'booking_id' => 24,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            // Août
            //26
            [
                'hash' => 'd76f16aff3b9d44c99ee65057af150e82775b796376cb586aba221149f2b085a',
                'booking_id' => 25,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //27
            [
                'hash' => '72281df9b5e36df25efab882c1b72107552381ad2faf964b70ae7e1d8eb8edb0',
                'booking_id' => 26,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //28
            [
                'hash' => '986867eec5b001a9b3c5508d416da1f52e17103c9e0446b685d03a51dc407cc4',
                'booking_id' => 27,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //29
            [
                'hash' => 'eb1c94d33b46d1305135898b58307d09ef473ddfe7d85c9eb01129a459783661',
                'booking_id' => 28,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //30
            [
                'hash' => '3986fb15a76beec06d5ad496da1e94ad846deefd711379b2042043f430f8fff5',
                'booking_id' => 29,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //31
            [
                'hash' => '92b8bd9a48a8b91fbfb8fb0a7c55bc7dae62a3828ec13e0c0adfb3769904d993',
                'booking_id' => 30,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //32
            [
                'hash' => 'cfea03635bb87baeedaf31da7be2d2174a969dcc4712dd124c03b4c99f7c29e6',
                'booking_id' => 31,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //33
            [
                'hash' => '120649e0e6eff9797bfbbe083edfddcddc0499d5103e4f91af8ac0dae38cf3ba',
                'booking_id' => 32,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //34
            [
                'hash' => '942caa569b8345c5b06d61013a0973b60940cc6b4d54affe088a9d40e4292d48',
                'booking_id' => 33,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //35
            [
                'hash' => '42feb3991764135b531c36fa60bd7bbded125f81d247934e2a6437d94ddb853a',
                'booking_id' => 34,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //36
            [
                'hash' => '963900f380698930bd47b791552f9de53eca54c5a233850962f9d451cefdffe6',
                'booking_id' => 35,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //37
            [
                'hash' => 'a5752cf138e059d781971f51dd00a52dc2e94496b371ac9fb7ad7824a812d3ca',
                'booking_id' => 36,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //38
            [
                'hash' => 'fd024cedf1608be34b765e3cd33b554fec0cf4727f18362964abab67b5b5067c',
                'booking_id' => 37,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //39
            [
                'hash' => '7d08493188e36755673c68b8f85909ef26f21234df1bea4c5f02d3980a13ce42',
                'booking_id' => 38,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //40
            [
                'hash' => '3e8e0bf9381201e73cbe24187fdb341dffeaa3d7265d3eb34b8828063990f8c3',
                'booking_id' => 39,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //41
            [
                'hash' => '0ccf174580b2af58d7afb40939507bc5844b9f42dc17d785d5e24b3e2228e680',
                'booking_id' => 40,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //42
            [
                'hash' => '37af85e2926f2124ce84a2b1ff316a8004b2405011c15baa9452abcb7a820b02',
                'booking_id' => 41,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //43
            [
                'hash' => '4fa01f4737dbc9970720634feaf52dc371fe9b96d416a2d6f212d631b45b1c83',
                'booking_id' => 42,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //44
            [
                'hash' => '13d524d661bd0891f0b97b12832a6ae34e90933404d6a367eb4b308620881d5c',
                'booking_id' => 43,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //45
            [
                'hash' => 'a48aed817696e710639747818ed9d7d56b04d22bf610f6c457d9b2aee47ad50a',
                'booking_id' => 44,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //46
            [
                'hash' => '564a2dfdc657b80623230d2512665cca07796864cf6a4269f72d452a7e50cd07',
                'booking_id' => 45,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //47
            [
                'hash' => 'b70192d932e18b5ce19bbc7b08d06e0bc1174a16e92d31a9a3d3e23ce18ad13b',
                'booking_id' => 46,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //48
            [
                'hash' => '1aa12835178e08deabeba402dd14c3bfd5811a9ec9de05e374653dd559e41896',
                'booking_id' => 47,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            //49
            [
                'hash' => '464d34f0e3f09d13032e6bb631a80f733072ee83198e2cbb0aa0fd57be87679d',
                'booking_id' => 48,
                'ended_at' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];
        Nfc::insert($datas);
    }
}
