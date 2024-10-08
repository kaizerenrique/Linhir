<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Configuracion;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ConfiguracionInicialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles del Sistema
        $admin = Role::create(['name' => 'Administrador']); //Administrador del Sistema
        $oficial = Role::create(['name' => 'Oficial']); //Oficial del gremio
        $suboficial = Role::create(['name' => 'Sub-Oficial']); //Oficial del gremio
        $user = Role::create(['name' => 'Usuario']); //Usuario Final
        $rentA = Role::create(['name' => 'Renter_A']); //usuario renter
        $rentB = Role::create(['name' => 'Renter_B']); //usuario renter
        
        //Permisos del Sistema
        //Permisos de la barra del menu
        Permission::create(['name' => 'ver_detalles_jugador'])->syncRoles([$admin , $oficial , $suboficial ]);
        Permission::create(['name' => 'editar_jugador'])->syncRoles([$admin , $oficial ]); 
        Permission::create(['name' => 'eliminar_jugador'])->syncRoles([$admin , $oficial]); 
        Permission::create(['name' => 'menu_configuraciones'])->syncRoles([$admin]); 

        $useradmin = User::where('email','kayserenrique@gmail.com')->first();

        if ($useradmin) {
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->assignRole('Administrador')->personajes()->create([
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
        ])->assignRole('Administrador')->personajes()->create([
            'Id_albion' => 'n1GOJRBjS3OhQMdL8oZtdg',
			'Name' => 'Dmaro',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);

        $userbran = User::where('email','matelgyt@gmail.com')->first();

        if ($userbran) {
            $userbran->delete();
        }

        $userbran = User::create([
            'name' => 'BrandWard',
            'email' => 'matelgyt@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->assignRole('Oficial')->personajes()->create([
            'Id_albion' => 'DGUu5ZaWRRqQi8Bm767kvw',
			'Name' => 'BrandWard',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);

        $usermr = User::where('email','superlord254@gmail.com')->first();

        if ($usermr) {
            $usermr->delete();
        }

        $usermr = User::create([
            'name' => 'MrOscurito',
            'email' => 'superlord254@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->assignRole('Oficial')->personajes()->create([
            'Id_albion' => '0gjBUrFbRL23RI4f6SSmHQ',
			'Name' => 'MrOscurito',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);

        $usertidal = User::where('email','tidaldg@gmail.com')->first();

        if ($usertidal) {
            $usertidal->delete();
        }

        $usertidal = User::create([
            'name' => 'tidald',
            'email' => 'tidaldg@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => '2023-07-24 14:14:14'
        ])->assignRole('Oficial')->personajes()->create([
            'Id_albion' => 'WNFdnH5xRymDJZy9jklMpw',
			'Name' => 'tidald',
			'GuildId' => 'iS2Q2Mw3S1asC9GVMC5P2w'
        ]);

        $config = Configuracion::create([
            'notificar' => false
        ]);

    }
}
