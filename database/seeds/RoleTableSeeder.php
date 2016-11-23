<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        	[
        		'name' => 'admin',
        		'display_name' => 'Admin',
        		'description' => 'Admin Role'
        	],
        	[
        		'name' => 'user',
        		'display_name' => 'User',
        		'description' => 'User Role'
        	]
        ];

        foreach ($role as $key => $value) {
        	Role::create($value);
        }
    }
}
