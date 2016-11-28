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
                'name' => 'sub-admin',
                'display_name' => 'Sub Admin',
                'description' => 'Sub Admin'
            ],[
                'name' => 'reseller',
                'display_name' => 'Reseller',
                'description' => 'Reseller'
            ],[
                'name' => 'sub-reseller',
                'display_name' => 'Sub Reseller',
                'description' => 'Sub Reseller'
            ],[
        		'name' => 'client',
        		'display_name' => 'Client',
        		'description' => 'Client'
        	]
        ];

        foreach ($role as $key => $value) {
        	Role::create($value);
        }
    }
}
