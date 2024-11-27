<?php

namespace Database\Factories;

use App\Models\Spec;
use App\Models\SpecRow;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecRow>
 */
class SpecRowFactory extends Factory
{
    protected $model = SpecRow::class;

    public function definition()
    {
        return [
            'spec_id' => Spec::factory(),
            'row_identifier' => $this->faker->numberBetween(1000, 9999), // Example range, adjust as needed
            'content' => $this->faker->sentence,
            // 'value' => $this->faker->sentence,
            'priority' => array_rand(['M', 'S', 'C', 'W']),
            'version' => 1,
            // 'accepted_at' => $this->faker->boolean ? now() : null,
            'accepted_at' =>  null,
            'deleted_at' => null,
        ];
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
}
