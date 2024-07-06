<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Official;
use App\Models\Council;
use App\Models\Infrastructure;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Article::factory(10)->create();
        Official::factory(20)->create();
        Council::factory(20)->create();
        Infrastructure::factory(10)->create();

        DB::table('profiles')->insert([
            'geografis' => Str::random(20),
            'ekonomi' => Str::random(30),
        ]);

        DB::table('users')->insert([
            'name' => 'Awang Candra',
            'email' => 'adminpertama@desa.com',
            'password' => Hash::make('admin123')
        ]);

        DB::table('users')->insert([
            'name' => 'Arif',
            'email' => 'adminkedua@desa.com',
            'password' => Hash::make('admin123')
        ]);

        DB::table('users')->insert([
            'name' => 'Fatta Rizqina',
            'email' => 'adminketiga@desa.com',
            'password' => Hash::make('admin123')
        ]);

        DB::table('visions')->insert([
            'visi' => 'ini adalah visi dari desa kami',
            'misi' => 'sedangkan ini adalah misi desa kami'
        ]);
    }
}
