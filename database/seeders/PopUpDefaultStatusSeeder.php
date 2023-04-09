<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PopUpDefaultStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'key'                       =>  'pop_up_status',
            'value'                     =>  'false',
            'value_mm'                  =>  'false',
        ];

        Settings::create($status);
    }
}
