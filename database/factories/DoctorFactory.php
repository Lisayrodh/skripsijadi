<?php
// DoctorFactory.php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        // Generate fake data for the doctor
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'photo' => function (array $attributes) {
                // Generate a fake image file for the doctor's photo
                $uploadedFile = UploadedFile::fake()->image('avatar.jpg');
                // Store the fake image file and return its path
                return $uploadedFile->store('img/doctors', 'public');
            },
            'twitter' => $this->faker->optional()->url,
            'facebook' => $this->faker->optional()->url,
            'instagram' => $this->faker->optional()->url,
            'linkedin' => $this->faker->optional()->url,
        ];
    }
}
