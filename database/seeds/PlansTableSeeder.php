<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'url' => 'free',
            'price' => 0.00,
            'description' => 'Plano gratuito'
        ]);

        Plan::create(
        [
            'name' => 'Basic',
            'url' => 'basic',
            'price' => 199.99,
            'description' => 'Plano basico'
        ]);
        
        Plan::create([
            'name' => 'Businers',
            'url' => 'businers',
            'price' => 499.99,
            'description' => 'Plano empresarial'
        ]);
    }
}
