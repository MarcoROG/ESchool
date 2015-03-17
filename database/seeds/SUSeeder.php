<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 17/03/15
 * Time: 13:18
 */
use App\Services\Helper;
use App\Users\User;
use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;

/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 17/03/15
 * Time: 12:00
 */

class SUSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->gender = mt_rand(0,1)==0?'M':'F';
        $u->name= 'Super';
        $u->surname= 'User';
        $u->birth_place= 'NoWhere';
        $u->catholic=0;
        $u->address='NoWhere';
        $u->email='mark.sg97@gmail.com';
        $u->telephone ='0331375209';
        $u->mobile = '3485783906';
        $u->password=bcrypt('password');
        $u->token= Helper::generateToken();
        $u->approved=true;
        $u->save();
        foreach(Role::all() as $r) {
            $u->assignRole($r->id);
        }
    }

}