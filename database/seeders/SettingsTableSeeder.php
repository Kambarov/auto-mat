<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'phone' => '+998 (94) 645-86-56',
            'email' => 'automat@gmail.com',
            'address' => 'Ташкент, Узбекистан',
            'socials' => [
                'facebook' => 'fb.com/AutoMatuz',
                'instagram' => 'instagram.com/auto_mat.uz',
                'telegram' => 't.me/automatuz'
            ]
        ]);
    }
}
