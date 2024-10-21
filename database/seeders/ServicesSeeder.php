<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'title' => json_encode([
                    'en' => 'Turning works',
                    'ru' => 'Токарные работы',
                    'uk' => 'Токарні роботи'
                ]),
                'description' => json_encode([
                    'en' => 'Turning works',
                    'ru' => 'Токарные работы',
                    'uk' => 'Токарні роботи'
                ]),
                'short_description' => json_encode([
                    'en' => 'Maxima offers customized execution of turning work based on customer samples or drawings.',
                    'ru' => 'В Maxima доступно индивидуальное исполнение токарных работ по образцам или чертежам клиентов.',
                    'uk' => 'У Maxima є індивідуальне виконання токарних робіт за зразками або кресленнями клієнтів.'
                ]),
                'text' => json_encode([
                    'en' => 'Maxima offers customized execution of turning work based on customer samples or drawings.',
                    'ru' => 'В Maxima доступно индивидуальное исполнение токарных работ по образцам или чертежам клиентов.',
                    'uk' => 'У Maxima є індивідуальне виконання токарних робіт за зразками або кресленнями клієнтів.'
                ]),
                'image' => '',
                'status' => 1,
                'slug' => 'turning-works',
                'products_link' => 1,
                'applications_link' => 1,
            ],
            [
                'title' => json_encode([
                    'en' => 'Milling work',
                    'ru' => 'Фрезерные работы',
                    'uk' => 'Фрезерні роботи'
                ]),
                'description' => json_encode([
                    'en' => 'Milling works',
                    'ru' => 'Фрезерные работы',
                    'uk' => 'Фрезерні роботи'
                ]),
                'short_description' => json_encode([
                    'en' => 'Maxima company offers all types of turning and milling work of any complexity.',
                    'ru' => 'Компания Maxima предлагает все виды токарно-фрезерных работ любой сложности.',
                    'uk' => 'Компанія Maxima пропонує всі види токарно-фрезерних робіт будь-якої складності.'
                ]),
                'text' => json_encode([
                    'en' => 'Maxima company offers all types of turning and milling work of any complexity.',
                    'ru' => 'Компания Maxima предлагает все виды токарно-фрезерных работ любой сложности.',
                    'uk' => 'Компанія Maxima пропонує всі види токарно-фрезерних робіт будь-якої складності.'
                ]),
                'image' => '',
                'status' => 1,
                'slug' => 'milling-works',
                'products_link' => 1,
                'applications_link' => 1,
            ]
        ]);
    }
}
