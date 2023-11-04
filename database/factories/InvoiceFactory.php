<?php

namespace Database\Factories;

use App\Models\Purchaser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Billed', 'Paid', 'Void']);

        return [
            'purchaser_id' => Purchaser::factory(),
            'amount' => $this->faker->numberBetween(1, 999999),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'Paid' ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}
