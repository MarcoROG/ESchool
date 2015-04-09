<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    private $tables=[
        'absences',
        'absences_lessons',
        'classes',
        'classes_lessons',
        'classes_tests',
        'classes_users',
        'classrooms',
        'lesson_types',
        'lessons',
        'lessons_schooltrips',
        'lessons_tests',
        'lessons_topics',
        'message_types',
        'messages',
        'messages_resources',
        'permission_role',
        'permission_user',
        'permissions',
        'pt_conferences',
        'resources',
        'role_user',
        'roles',
        'school_years',
        'schooltrips',
        'schooltrips_user',
        'subjects',
        'test_types',
        'tests',
        'tests_topics',
        'topics',
        'tutors',
        'users'
    ];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->command->info('Truncating the tables');
        Model::unguard();
        DB::statement("SET foreign_key_checks=0");
        foreach($this->tables as $t){
            DB::table($t)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");
        $this->command->info('Done');

        $this->call('RolesSeeder');
        $this->call('UsersSeeder');
        $this->call('SUSeeder');
        $this->call('SchoolYearsSeeder');
        $this->call('UserPermissionSeeder');
        $this->call('SchoolYearsPermissionSeeder');
	}


}
