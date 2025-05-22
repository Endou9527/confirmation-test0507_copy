<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // protected $contact = Contact::class;

    public function definition()
    {
        return [
        // 'last_name' =>$this->faker->name,
        // 'first_name' =>$this->faker->name,
        'name' =>$this->faker->name,
        'gender' =>$this->faker->randomElement(['男性','女性','その他']),
        'email' =>$this->faker->safeEmail(),
        'tel' =>$this->faker->randomNumber(),
        'address' =>$this->faker->address(),
        'address__building' =>$this->faker->word(),
        'category_id' =>$this->faker->numberBetween(1,5),
        'detail' =>$this->faker->sentence()
        ];
    }
}
