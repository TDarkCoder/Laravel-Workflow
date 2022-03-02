<?php

namespace Database\Factories;

use App\Models\PullRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PullRequest>
 */
class PullRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'body' => $this->faker->paragraph,
        ];
    }
}
