<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'KTK Pharmacy',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'KTK Pharmacy',
        ],
        [
            'key'                       =>  'site_url',
            'value'                     =>  'www.ktkpharmacy.com',
        ],
        [
            'key'                       =>  'default_email',
            'value'                     =>  'ktkpharmacy.info@gmail.com',
        ],
        [
            'key'                       =>  'default_phone_number',
            'value'                     =>  '+95 9 976 822711',
        ],
        [
            'key'                       =>  'default_address',
            'value'                     =>  'NO A (11), 30 STREET, BETWEEN 56 X 57 STREET, MANDALAY, MYANMAR',
        ],
        [
            'key'                       =>  'default_location',
            'value'                     =>  '<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=KTK Pharmacy Mandalay&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
        ],
        [
            'key'                       =>  'default_staffs',
            'value'                     =>  0,
        ],
        [
            'key'                       =>  'default_products',
            'value'                     =>  0,
        ],
        [
            'key'                       =>  'default_curr_partner',
            'value'                     =>  0,
        ],
        [
            'key'                       =>  'default_dist_region',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'header_text',
            'value'                     =>  "This is an ktk pharmacy who's selling the Pharmaceuticals & Consumer Daily Needs with fair prices in one place",
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  'COPYRIGHT © 2023 KTK PHARMACY CO., LTD. ALL RIGHTS RESERVED.',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '#',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '#',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = Settings::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->settings) . ' records');
    }
}
