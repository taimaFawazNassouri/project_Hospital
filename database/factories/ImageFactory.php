<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use App\Models\Doctor;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Image::class;
    public function definition(): array
    {
        return [
            'filename' =>$this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg']),
            'imageable_id' =>Doctor::all()->random()->id,
            'imageable_type' =>'App\Models\Doctor',
         ];
    }
}
