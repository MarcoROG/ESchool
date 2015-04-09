<?php
use App\Entities\SchoolYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 16:58
 */

class SchoolYearsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Seeding schoolyears');
        for($i=1995;$i<2020;$i++){
            SchoolYear::create(array(
                'first_day_first_semester'=> Carbon::create($i,9,rand(5,18)),
                'last_day_first_semester'=> Carbon::create($i,12,rand(15,24)),
                'first_day_second_semester'=> Carbon::create($i+1,1,rand(7,15)),
                'last_day_second_semester'=> Carbon::create($i+1,6,rand(1,7))
            ));
        }
    }

}
