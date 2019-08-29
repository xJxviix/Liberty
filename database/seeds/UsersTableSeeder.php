<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('users')->insert([
            'name'=>'Javi',
            'lastname'=>'Suarez',
            'email'=>'javi@gmail.com',
            'password'=>bcrypt('RealMadrid'),
            'tipo'=>'administrador',
            'photo' => 'seeds/default.png',
        ]);

        DB::table('users')->insert([
            'name'=>'JB',
            'lastname'=>'',
            'email'=>'jb@administrador.com',
            'password'=>bcrypt('Administrador'),
            'tipo'=>'administrador',
            'photo' => 'seeds/default.png',
        ]);

        DB::table('users')->insert([
            'name'=>'Andrea',
            'lastname'=>'',
            'email'=>'andrea@administrador.com',
            'password'=>bcrypt('Admin1234'),
            'tipo'=>'administrador',
            'photo' => 'seeds/default.png',
        ]);

        DB::table('users')->insert([
            'name'=>'Jennifer',
            'lastname'=>'Alcañiz Sosa',
            'email'=>'jennifer@gmail.com',
            'password'=>bcrypt('Jennifer'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Victor',
            'lastname'=>'Perez Garcia',
            'email'=>'victor@gmail.com',
            'password'=>bcrypt('Barcelona'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Alejandro',
            'lastname'=>'Casado',
            'email'=>'alejandro@outlook.com',
            'password'=>bcrypt('Alejandro'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Alicia',
            'lastname'=>'Gomez',
            'email'=>'alicia@outlook.com',
            'password'=>bcrypt('Alicante'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Lorena',
            'lastname'=>'Lopez',
            'email'=>'lorena@gmail.es',
            'password'=>bcrypt('Lorena1234'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Noelia',
            'lastname'=>'Perez',
            'email'=>'n.perez@gmail.com',
            'password'=>bcrypt('Mika1235i'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Sandra',
            'lastname'=>'Monroy',
            'email'=>'sandra.monroy@gestimed.com',
            'password'=>bcrypt('Gestimed201835'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Jose',
            'lastname'=>'García',
            'email'=>'jo.garcia@gmail.com',
            'password'=>bcrypt('Murcia2019'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Antonio',
            'lastname'=>'Moreno',
            'email'=>'anthony.m@outlook.es',
            'password'=>bcrypt('Cocacola'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Alexandra',
            'lastname'=>'Huacon',
            'email'=>'alexandra@gmail.es',
            'password'=>bcrypt('Alexandra'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Michael',
            'lastname'=>'Jackson',
            'email'=>'mikaeil@gmail.com',
            'password'=>bcrypt('MickailJ'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Alex',
            'lastname'=>'Galipienso',
            'email'=>'alex.gali@gmail.com',
            'password'=>bcrypt('Alejandro'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Alberto',
            'lastname'=>'Rodriguez',
            'email'=>'alberto@outlook.com',
            'password'=>bcrypt('Albertoooo'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Carlota',
            'lastname'=>'Nandez',
            'email'=>'carlota.nandez@gmail.com',
            'password'=>bcrypt('CarlotaNan'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Atahualpa',
            'lastname'=>'Perez',
            'email'=>'atahualpa@hotmail.com',
            'password'=>bcrypt('Atahualpa'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Noemi',
            'lastname'=>'Casado',
            'email'=>'noemi.cas@outlook.com',
            'password'=>bcrypt('noemi.cas'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Ana',
            'lastname'=>'Manzano',
            'email'=>'ana.manzano@gmail.com',
            'password'=>bcrypt('Ana.manzano'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'David',
            'lastname'=>'Vidal',
            'email'=>'david.vida@gmail.com',
            'password'=>bcrypt('davidvidal'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Paula',
            'lastname'=>'del quinche',
            'email'=>'paula@outlook.com',
            'password'=>bcrypt('Paula1234t'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Violeta',
            'lastname'=>'Mora',
            'email'=>'vio.mora@outlook.com',
            'password'=>bcrypt('Violeta'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Beatriz',
            'lastname'=>'Sanchez',
            'email'=>'bea.sa@gmail.es',
            'password'=>bcrypt('0893248ruiy'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Jessica',
            'lastname'=>'Gutierrez',
            'email'=>'jess.@hotmail.com',
            'password'=>bcrypt('Jess3445'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);

        DB::table('users')->insert([
            'name'=>'Mikaelo',
            'lastname'=>'Suarez',
            'email'=>'mika1234@outlook.com',
            'password'=>bcrypt('Mika12356'),
            'tipo'=>'registrado',
            'photo' => 'seeds/default.png'
        ]);


        
    }
}
