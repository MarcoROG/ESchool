<?php
use App\Services\Helper;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Users\User;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 17/03/15
 * Time: 12:00
 */

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=[['Marco','Luca','Leonardo','Claudio','Riccardo','Andrea'
        ,'Simone','Alessandro','Davide','Giacomo'],
            ['Francesca','Andrea','Elisa','Maria','Irene','Stefania','Aurora'
            ,'Michela','Carolina','Noemi']];
        $surnames=['Bellan','Colombo','Gussoni','Gasbarri','Bacchi','Tropeano',
        'Pigni','Piacentini','Camarda','Salmoiraghi','Motta','Raimondi'];
        $places=['Olgiate Olona','Solbiate Olona','Fagnano Olona','Busto Arsizio',
        'Castano Primo','Borsano','Quarto Oggiaro'];

        for($i=0;$i<25;$i++){
            $u = new User();
            $u->gender = mt_rand(0,1)==0?'M':'F';
            $u->name= $names[$u->gender=='F'][mt_rand(0,9)];
            $u->surname= $surnames[mt_rand(0,11)];
            $u->birth_place= $places[mt_rand(0,6)];
            //$u->birth_day= Carbon::create(mt_rand(1995,2003),mt_rand(1,12),mt_rand(1,28));
            $u->catholic=mt_rand(0,1);
            $u->address='Via dei munghi 14, munghiland';
            $u->email='user'.$i.'@liceotosi.va.it';
            $u->telephone ='0331375210';
            $u->mobile = mt_rand(1111111111,9999999999);
            $u->password=bcrypt('password'.$i);
            $u->token= Helper::generateToken();
            $u->save();
            $u->roles()->attach(mt_rand(1,6));
        }
    }

}
