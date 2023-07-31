<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(PermissionSeeder::class);
         $this->call(SuperAdminSeeder::class);
        // $this->call(SettingsTableSeeder::class);
        // $this->call(DefaultContentTypesSeeder::class);
        // $this->call(SettingPopUpImgSeeder::class);
        // $this->call(SliderSeeder::class);
        // $this->call(CreateLocationSeeder::class);
        //$this->call(PopUpDefaultStatusSeeder::class);
    }
}
