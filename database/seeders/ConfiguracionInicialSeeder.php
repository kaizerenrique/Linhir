<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ConfiguracionInicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useradmin = User::where('email','kayserenrique@gmail.com')->first();

        if ($useradmin) {
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->personajes()->create([
            'Id_albion' => 'iPSdBmtiSoSAL1Sp2DX1YQ',
			'Name' => 'kaizerenrique',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);


        $userday = User::where('email','dmaro006@gmail.com')->first();

        if ($userday) {
            $userday->delete();
        }

        $userday = User::create([
            'name' => 'Dayana Martinez',
            'email' => 'dmaro006@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->personajes()->create([
            'Id_albion' => 'n1GOJRBjS3OhQMdL8oZtdg',
			'Name' => 'Dmaro',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);
    }
}
