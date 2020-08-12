<?php

use Illuminate\Database\Seeder;
use App\Models\{User, Tenant};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        //Pega o tenant da base de dado para ser passado como parametro para criação do user abaixo

        $tenant->users()->create([
            'name' => 'Adm',
            'email' => 'teste@teste.com.br',
            'password' => bcrypt('123456'),

        ]);
    }
}
