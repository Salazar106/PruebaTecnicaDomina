<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'administrador', 
        'email'=>'admin@admin.com', 
        'password'=>'$10$TZjuspeHdeSlWvvY9/dFP.Na9byF.wSH3/NzVT6muN9VnXHX0UiNe', 
        'rol'=>1]);

        User::create(['name' => 'Cliente', 
        'email'=>'cliente@cliente.com', 
        'password'=>'$10$TZjuspeHdeSlWvvY9/dFP.Na9byF.wSH3/NzVT6muN9VnXHX0UiNe', 
        'rol'=>1]);

        User::create(['name' => 'Consulta', 
        'email'=>'consulta@consulta.com', 
        'password'=>'$10$TZjuspeHdeSlWvvY9/dFP.Na9byF.wSH3/NzVT6muN9VnXHX0UiNe', 
        'rol'=>1]);
        

    }
}
