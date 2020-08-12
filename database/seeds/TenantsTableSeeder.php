<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        //Pega o plano cadastrado na base de dados para ser usado como parametro para criação do tenant

        $plan->tenants()->create([
            'cnpj' => '23882706000120',
            'name' => 'JnsSystem',
            'url' => 'jnssystem',
            'email' => 'teste@teste.com.br'
        ]);
    }
}
