<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class SchoolYearsPermissionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Seeding schoolyears permissions');
        $genericUser=Permission::create([
            'name' => 'schoolyears',
            'slug' => [
                'create' => false,
                'view' => true,
                'view.specific' =>true,
                'edit' => false,
                'approve' => false,
                'delete' => false,
            ],
            'description' => 'generic permission regarding school years'
        ]);
        $secretaryUser = Permission::create([
            'name' => 'schoolyears.secretary',
            'slug' => [
                'create' => true,
                'edit' => true,
                'approve' => true,
                'delete' => true,
            ],
            'inherit_id' => $genericUser->getKey(),
            'description' => 'secretary permission regarding school years'
        ]);
        $this->command->info('Assigning them to roles');
        $roles=Role::all();
        foreach($roles as $r){
            if($r->slug=='secretary'){
                $r->assignPermission('schoolyears.secretary');
            }else{
                $r->assignPermission('schoolyears');
            }
        }
    }

}
