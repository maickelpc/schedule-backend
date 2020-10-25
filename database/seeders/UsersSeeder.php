<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([ 
            'name' => 'Jorge', 
            'email' => 'jorge@gmail.com', 
            'password' => '123456'
        ]);

        $clara = User::create([ 
            'name' => 'Clara', 
            'email' => 'clara@gmail.com', 
            'password' => '123456'
        ]);
        
        $roleAdmin = Role::where('name', 'admin')->first();
        $clara->assignRole($roleAdmin);

    }
}
