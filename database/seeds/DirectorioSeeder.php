<?php

use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            [
                'nombre'=>'Alvaro',
                'apellido'=>'Restrepo',
                'telefono'=>3226232929,
                'direccion' => 'cll 28',
                'email' => 'alvaro@alvaro',
                'foto' => null,

            ],
            [
                'nombre'=>'Veronica',
                'apellido'=>'Chamorro',
                'telefono'=>3122971002,
                'direccion' => 'cll 52',
                'email' => 'vero@vero',
                'foto' => null,
            ]
        ]);
    }
}
