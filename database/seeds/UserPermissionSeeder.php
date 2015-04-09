<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class UserPermissionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating user permissions');
        $genericUser=Permission::create([
            'name' => 'users',
            'slug' => [
                'create' => false,
                'view' => true,
                'view.specific' =>true,
                'edit' => false,
                'approve' => false,
                'delete' => false,
            ],
            'description' => 'generic permission regarding users'
        ]);
        $secretaryUser = Permission::create([
            'name' => 'users.secretary',
            'slug' => [
                'create' => true,
                'edit' => true,
                'approve' => true,
                'delete' => true,
            ],
            'inherit_id' => $genericUser->getKey(),
            'description' => 'secretary permission regarding users'
        ]);
        $this->command->info('Assigning them to roles');
        $roles=Role::all();
        foreach($roles as $r){
            if($r->slug=='secretary'){
                $r->assignPermission('users.secretary');
            }else{
                $r->assignPermission('users');
            }
        }
    }

}
