<?php

namespace Database\Seeders;

use App\Models\ContentType;
use App\Traits\GenerateSlug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultContentTypesSeeder extends Seeder
{
    use GenerateSlug;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content_types = [
            [
                'name' => 'News & Blogs',
                'name_mm' => 'သတင်းများနှင့်ဘလော့များ'
            ],
            [
                'name' => 'CSR',
                'name_mm' => 'အသင်းအဖွဲ့ လူမှုရေး လုပ်ဆောင်ချက်များ'
            ]
        ];

        foreach ($content_types as $key => $content_type) {
            ContentType::create([
                'name' => $content_type['name'],
                'name_mm' => $content_type['name_mm'],
                'slug' => $this->generateSlug($content_type['name'], 'content_types'),
                'deleted_at' => Null
            ]);
        }
    }
}
