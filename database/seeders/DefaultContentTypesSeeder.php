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
            'News & Blogs',
            'CSR'
        ];

        foreach ($content_types as $key => $name) {
            ContentType::create([
                'name' => $name,
                'slug' => $this->generateSlug($name, 'content_types'),
                'deleted_at' => Null
            ]);
        }
    }
}
