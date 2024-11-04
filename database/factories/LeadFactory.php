<?php

namespace Database\Factories;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    protected $model = Lead::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if a country code should be added
        $countryCode = $this->faker->boolean ? '+' . $this->faker->numberBetween(1, 99) . ' ' : '';

        // Generate a phone number with a varying length between 7 to 10 digits
        $phoneNumber = $this->faker->numerify($countryCode . $this->faker->randomNumber(7, true));

        //states and countries
        $countries = ['India'];
        $states = ['Delhi', 'Uttar Pradesh', 'Maharashtra', 'Punjab', 'Telangana', 'Tamilnadu'];
        $blocks = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];

        //generate address
        $address = $this->faker->randomElement($blocks) .'-'. $this->faker->numberBetween(101,798) . ', ' . $this->faker->randomElement($states) . ', ' . $this->faker->randomElement($countries);

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->boolean?$this->faker->safeEmail:null,
            'phone' => $phoneNumber,
            'address' => $address,
            'message' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['new', 'contacted', 'in progress', 'converted', 'closed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
