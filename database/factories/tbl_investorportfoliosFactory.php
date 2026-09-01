<?php

namespace Database\Factories;

use App\Models\tbl_investorportfolios;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<tbl_investorportfolios>
 */
class tbl_investorportfoliosFactory extends Factory
{
    protected $model = tbl_investorportfolios::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalCost = fake()->randomFloat(2, 1000, 500000);
        $marketValue = fake()->randomFloat(2, 1000, 500000);

        return [
            'user_id' => User::factory(),
            'fund_id' => fake()->numberBetween(1, 3),
            'unit_holding' => fake()->randomFloat(4, 1, 10000),
            'total_cost_bdt' => $totalCost,
            'current_market_value_bdt' => $marketValue,
            'unrealized_gain_loss_bdt' => $marketValue - $totalCost,
            'as_of_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}