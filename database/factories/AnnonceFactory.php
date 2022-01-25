<?php

namespace Database\Factories;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array    
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->realText(1000),
            'location' => $this->faker->city(),
            'departement' => $this->faker->randomNumber(2),
            'country' => $this->faker->country(),
            'isRemote' => $this->faker->boolean(15),
            'pay' => $this->faker->randomNumber(5),
            'experience' => $this->faker->optional()->randomDigitNot([6, 7, 8, 9]),
            'company' => $this->faker->company(),
            'categories_id' => Category::inRandomOrder()->first(),
            'users_id' => User::inRandomOrder()->first(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Annonce $annonce) {
            if ($annonce->getAttribute('isRemote') === true) {
                $annonce->setAttribute('location', null);
                $annonce->setAttribute('departement', null);
            }
        });
    }
}
