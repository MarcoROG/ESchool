<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kodeine\Acl\Models\Eloquent\Role;

class RolesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");
        Role::create(['name'=>'Studente',
            'slug'=>'student',
            'description'=>'An user who attends standard didactic lessons.'
        ]);
        Role::create(['name'=>'Insegnante',
            'slug'=>'teacher',
            'description'=>'An user who teaches stuff didactic lessons.'
        ]);
        Role::create(['name'=>'Segretario',
            'slug'=>'secretary',
            'description'=>'An user who manages burocratic stuff.'
        ]);
        Role::create(['name'=>'Tecnico',
            'slug'=>'technician',
            'description'=>'An user who helps in labs.'
        ]);
        Role::create(['name'=>'Personale ATA',
            'slug'=>'ata',
            'description'=>'An user who does general purpose supervision jobs.'
        ]);
        Role::create(['name'=>'Esterno',
            'slug'=>'extern',
            'description'=>'An user who doesn\'t belong to the didactic side of the school
            but attends public lessons or is the tutor of a student.'
        ]);
    }

}
