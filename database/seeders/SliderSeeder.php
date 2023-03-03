<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            [
                'image_url' => "assets/images/2.jpg",
                'url' => "#"
            ],
            [
                'image_url' => "assets/images/2.jpg",
                'url' => "#"
            ],
            [
                'image_url' => "assets/images/2.jpg",
                'url' => "#"
            ],
            [
                'image_url' => "assets/images/2.jpg",
                'url' => "#"
            ]
        ];

        foreach ($sliders as $key => $slider) {
            Slider::create($slider);
        }
    }
}
