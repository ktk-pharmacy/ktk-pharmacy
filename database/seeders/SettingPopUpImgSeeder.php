<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingPopUpImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pop_up = [
            'key'                       =>  'pop_up',
            'value'                     =>  'assets/images/ktk_icon.jpg',
            'value_mm'                  =>  'assets/images/ktk_icon.jpg',
        ];

        Settings::create($pop_up);
    }
}
