<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nombre' => 'Melanie',
            'apellido' => 'Arias',
            'usuario' => 'gteran2',
            'ciudad' => 'Guayaquil',
        ]);
        // Puedes agregar más usuarios aquí si lo necesitas
    }
}
