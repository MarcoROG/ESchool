<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
        DB::statement("SET foreign_key_checks=0");
        Permission::truncate();
        DB::statement("SET foreign_key_checks=1");
        $genericUser=Permission::create([
            'name' => 'users',
            'slug' => [
                'create' => false,
                'view' => true,
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
