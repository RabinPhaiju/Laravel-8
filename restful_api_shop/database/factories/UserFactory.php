<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'image'=>$this->faker->randomElement(['1.jpg','2.jpg','3.jpg']),
            'verified'=> $verified = $this->faker->randomElement([User::VERIFIED_USER,User::UNVERIFIED_USER]),
            'verification_token'=> $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
            'admin'=> $verified = $this->faker->randomElement([User::ADMIN_USER,User::REGULAR_USER]),
        ];
    }
}
