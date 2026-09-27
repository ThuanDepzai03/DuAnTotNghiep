<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [            array (
  'name' => 'Jaron Lockman',
  'user' => 'demo_customer_01',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_01@example.test',
  'address' => '6704 White Trail Suite 276
Blockchester, NJ 79984',
  'tel' => '0994534683',
  'role' => 0,
),
            array (
  'name' => 'Letitia Schamberger Jr.',
  'user' => 'demo_customer_02',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_02@example.test',
  'address' => '4517 Margret Via
Weissnatstad, MN 77317',
  'tel' => '0901444662',
  'role' => 0,
),
            array (
  'name' => 'Dr. Zachary Gibson',
  'user' => 'demo_customer_03',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_03@example.test',
  'address' => '615 Braulio Mews
Waelchiborough, NH 09993',
  'tel' => '0973535142',
  'role' => 0,
),
            array (
  'name' => 'Ms. Lysanne Fritsch MD',
  'user' => 'demo_customer_04',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_04@example.test',
  'address' => '31857 Rogahn Plains Suite 205
Sauerhaven, MT 92744',
  'tel' => '0941988024',
  'role' => 0,
),
            array (
  'name' => 'Prof. Rose Bernier',
  'user' => 'demo_customer_05',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_05@example.test',
  'address' => '7303 Misty Pine
Annabellport, CO 40252-1924',
  'tel' => '0923790379',
  'role' => 0,
),
            array (
  'name' => 'Adolfo Kiehn DDS',
  'user' => 'demo_customer_06',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_06@example.test',
  'address' => '735 Izaiah Ports Apt. 963
Bradfordside, ND 68333',
  'tel' => '0984348412',
  'role' => 0,
),
            array (
  'name' => 'John Lang',
  'user' => 'demo_customer_07',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_07@example.test',
  'address' => '825 Volkman Neck
Walkerland, ND 79441',
  'tel' => '0993016261',
  'role' => 0,
),
            array (
  'name' => 'Dr. Arielle Yundt II',
  'user' => 'demo_customer_08',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_08@example.test',
  'address' => '65440 Justyn Valleys Suite 455
Ladariusport, WI 30616-9679',
  'tel' => '0913770876',
  'role' => 0,
),
            array (
  'name' => 'Mr. Sheridan Hirthe II',
  'user' => 'demo_customer_09',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_09@example.test',
  'address' => '252 Heaven Plaza
Port Wilmer, NJ 43464',
  'tel' => '0911555189',
  'role' => 0,
),
            array (
  'name' => 'Keagan Rosenbaum',
  'user' => 'demo_customer_10',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_10@example.test',
  'address' => '9805 Shanel Lock
South Micheal, NJ 72291',
  'tel' => '0933374774',
  'role' => 0,
),
            array (
  'name' => 'Dr. Keyon Yundt V',
  'user' => 'demo_customer_11',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_11@example.test',
  'address' => '5366 Harris Lane
Dustinland, LA 24682-6222',
  'tel' => '0995673871',
  'role' => 0,
),
            array (
  'name' => 'Laverne O\'Hara MD',
  'user' => 'demo_customer_12',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_12@example.test',
  'address' => '904 Jalyn Springs Apt. 799
Trishaborough, MT 11385-6834',
  'tel' => '0902888702',
  'role' => 0,
),
            array (
  'name' => 'Isac Feest',
  'user' => 'demo_customer_13',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_13@example.test',
  'address' => '9017 Fabian Lodge Suite 253
East Zane, OR 95923-3654',
  'tel' => '0962388433',
  'role' => 0,
),
            array (
  'name' => 'Alex Donnelly Sr.',
  'user' => 'demo_customer_14',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_14@example.test',
  'address' => '2092 Conroy Villages Suite 054
West Kenna, OK 24354-0420',
  'tel' => '0906591128',
  'role' => 0,
),
            array (
  'name' => 'Danny Strosin',
  'user' => 'demo_customer_15',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_15@example.test',
  'address' => '204 Reta Loop
Bartolettibury, NM 19085-5992',
  'tel' => '0963003885',
  'role' => 0,
),
            array (
  'name' => 'Dr. Helen Connelly III',
  'user' => 'demo_customer_16',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_16@example.test',
  'address' => '70208 Gorczany Drive
Port Brielleside, OK 89352',
  'tel' => '0979512217',
  'role' => 0,
),
            array (
  'name' => 'Prof. Wendell Sipes',
  'user' => 'demo_customer_17',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_17@example.test',
  'address' => '85216 Bauch Brooks
New Stephany, ME 05585-1379',
  'tel' => '0949333013',
  'role' => 0,
),
            array (
  'name' => 'Deonte Turcotte',
  'user' => 'demo_customer_18',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_18@example.test',
  'address' => '15907 Ezequiel River Apt. 168
Cronamouth, CA 71708',
  'tel' => '0943298671',
  'role' => 0,
),
            array (
  'name' => 'Terence Lebsack',
  'user' => 'demo_customer_19',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_19@example.test',
  'address' => '663 Jeff Green Suite 652
Balistreristad, CT 59724',
  'tel' => '0997897560',
  'role' => 0,
),
            array (
  'name' => 'Kirk Dietrich',
  'user' => 'demo_customer_20',
  'pass' => '$2y$12$vbTSTR51aZZIENUyUoQek.C38zWq3Sk7/sL3OuUSjZGYKo//uWInm',
  'email' => 'demo_customer_20@example.test',
  'address' => '736 Bode Center Apt. 269
Lake Gilbert, CT 44547',
  'tel' => '0927698526',
  'role' => 0,
),
        ];

        foreach ($users as $user) {
            \App\Support\CustomerTable::query()->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }
}