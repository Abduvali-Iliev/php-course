<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            'description' => $this->faker->paragraph(),
            'sex' => rand(1,2) == 1 ? "male" : "female",
            'state' => $this->faker->city(),
            'user_activity' => $this->faker->boolean(),
            'url' => $this->faker->url(),
            'dob' => $this->faker->date(),
            'picture' => $this->getImage(rand(1, 4))
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function getImage(int $image_number = 1)
    {
        $path = storage_path() . "/seed_pictures/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(100)->encode("jpg");
        Storage::disk('public')->put('pictures/' . $image_name, $resize->__toString());
        return 'pictures/' . $image_name;
    }
}
