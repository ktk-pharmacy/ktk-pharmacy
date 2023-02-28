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
            'key_mm'                    =>  'site_name_mm',
            'value'                     =>  'KTK Pharmacy',
            'value_mm'                  =>  'KTK Pharmacy',
        ],
        [
            'key'                       =>  'site_title',
            'key_mm'                    =>  'site_title_mm',
            'value'                     =>  'KTK Pharmacy',
            'value_mm'                  =>  'KTK Pharmacy',
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
            'key_mm'                    =>  'default_phone_number_mm',
            'value'                     =>  '+95 9 976 822711',
            'value_mm'                  =>  '+၉၅ ၉ ၉၇၆ ၈၂၂၇၁၁',

        ],
        [
            'key'                       => 'default_address',
            'key_mm'                    => 'default_address_mm',
            'value'                     => 'NO A (11), 30 STREET, BETWEEN 56 X 57 STREET, MANDALAY, MYANMAR',
            'value_mm'                  => 'အမှတ် အေ (၁၁), 30 လမ်း , 56 X 57 လမ်း , မန္တလေးမြို့ , မြန်မာ.',
        ],
        [
            'key'                       =>  'default_location',
            'value'                     =>  '<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=KTK Pharmacy Mandalay&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
        ],
        [
            'key'                       =>  'default_staffs',
            'key_mm'                    =>  'default_staffs_mm',
            'value'                     =>  200,
            'value_mm'                  => '၂၀၀'
        ],
        [
            'key'                       =>  'default_products',
            'key_mm'                    =>  'default_products_mm',
            'value'                     =>  2000,
            'value_mm'                  => '၂၀၀၀'
        ],
        [
            'key'                       =>  'default_curr_partner',
            'key_mm'                    =>  'default_curr_partner_mm',
            'value'                     =>  300,
            'value_mm'                  => '၃၀၀'
        ],
        [
            'key'                       =>  'default_dist_region',
            'key_mm'                    =>  'default_dist_region_mm',
            'value'                     =>  '20',
            'value_mm'                  =>  '၂၀',
        ],
        [
            'key'                       => 'header_text',
            'key_mm'                    => 'header_text_mm',
            'value'                     => "This is an ktk pharmacy who's selling the Pharmaceuticals & Consumer Daily Needs with fair prices in one place",
            'value_mm'                  => "KTK Pharmacy အား ဦးကျော်နိုင်မှ (၁၉၈၆) ခုနှစ်တွင် စတင်တည်ထောင်ခဲ့ပြီး သတ်မှတ်စံချိန်စံညွှန်း ပြည့်မှီသော ‌ဆေးဝါးများအား မြန်မာနိုင်ငံ အနှံ့အပြား လက်လီ/ လက်ကား ရောင်းချ ဖြန့်ဖြူးခဲ့သည်မှာ (၂၀၂၂)ခုနှစ်ဆိုလျှင် (၃၆)နှစ်တိုင် ကြာမြင့်ခဲ့ပြီး ဖြစ်ပါသည်။",
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
        [
            'key'                       =>  'about_company',
            'key_mm'                    =>  'about_company_mm',
            'value'                     =>  'KTK Pharmacy was founded by U Kyaw Naing in (1986) and
                                             has been selling and distributing medicines that meet the prescribed
                                            standards throughout Myanmar by retail/wholesale. It has been 36 years since (2022).
                                            Reaching full quality within
                                            4 periods; low price; good treatment of employees;
                                            We were able to pay attention to the main objective tasks such as being able to orderly deliver
                                            the goods to the specified places with standard vehicles.',
            'value_mm'                  => 'KTK Pharmacy အား ဦးကျော်နိုင်မှ (၁၉၈၆) ခုနှစ်တွင် စတင်တည်ထောင်ခဲ့ပြီး
                                            သတ်မှတ်စံချိန်စံညွှန်း ပြည့်မှီသော ‌ဆေးဝါးများအား မြန်မာနိုင်ငံ အနှံ့အပြား လက်လီ/ လက်ကား
                                            ရောင်းချ ဖြန့်ဖြူးခဲ့သည်မှာ (၂၀၂၂)ခုနှစ်ဆိုလျှင် (၃၆)နှစ်တိုင် ကြာမြင့်ခဲ့ပြီး ဖြစ်ပါသည်။
                                            ၄င်းကာလများအတွင်း အရည်အသွေးပြည့်မှီခြင်း၊ စျေးနှုန်းချိုသာခြင်း၊ ဝန်ထမ်းများ ဆက်ဆံမှုကောင်းမွန်ခြင်း၊
                                            ပစ္စည်းသယ်ယူ ပို့ဆောင်သည့် ယာဥ်များဖြင့် သတ်မှတ်နေရာများသို့ စနစ်တကျ ပို့ဆောင်ပေးနိုင်ခြင်း စသည့်
                                            အဓိကရည်မှန်းချက်တာဝန်များကို အလေးထား ဆောင်ရွက်နိုင်ခဲ့ပါသည်။'
        ],
        [
            'key'                       =>  'mission',
            'key_mm'                    =>  'mission_mm',
            'value'                     =>  'We strive to be the best, with our own values ​​and standards of action.',
            'value_mm'                  =>  'ကျွန်ုပ်တို့၏ ကိုယ်ပိုင်တန်ဖိုးနှင့် လုပ်ဆောင်ချက်များအား စံသတ်မှတ်ချက်များဖြင့် ကျွန်ုပ်တို့သည် အကောင်းဆုံးဖြစ်ရန် လုပ်ဆောင်ကြသည်။',
        ],
        [
            'key'                       =>  'vision',
            'key_mm'                    =>  'vision_mm',
            'value'                     =>  '',
            'value_mm'                  =>  '',
        ],
        [
            'key'                       =>  'core_value',
            'key_mm'                    =>  'core_value_mm',
            'value'                     =>  '',
            'value_mm'                  =>  '',
        ]

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
