<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Yefry Rolando Ortiz',
            'email'=> 'yefryyo@gmail.com',
            'password' => bcrypt('22222222')
            ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
