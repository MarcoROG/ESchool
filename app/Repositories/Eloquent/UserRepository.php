<?php namespace App\Repositories\Eloquent;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 31/03/15
 * Time: 12:50
 */




use App\Entities\Users\User;
use App\Repositories\Contracts\IUserRepository;
use Vinkla\Hashids\Facades\Hashids;

class UserRepository implements IUserRepository {
    /**
     * Finds an user by his identifier(both hashed or not)
     * @param $identifier
     * @param $hash
     * @return mixed
     */
    public function find($identifier,$hash=true){
        if($hash){
            return User::find(Hashids::decode($identifier)[0]);
        }
        return User::find($identifier);
    }

    /**
     * Returns all the approved users
     * @return mixed
     */
    public function allApproved(){
        return User::where('approved','=',true)->get();
    }

    /**
     * Returns all the unapproved users
     * @return mixed
     */
    public function allUnapproved(){
        return User::where('approved','=',false)->get();
    }

    /**
     * Updates the user data with an array of given parameters
     * @param $identifier
     * @param array $data
     * @return mixed
     */
    public function update($identifier,array $data){
        $user = $this->find($identifier);
        $infos=array_except($data,'password');
        $infos['catholic']=isset($infos['catholic']);
        $user->fill($infos);
        if(array_key_exists('password',$infos)){
            $user->password=$infos['password'];
        }
        $user->save();
    }

    /**
     * Creates an user with the given parameters.
     * @param array $data
     * @return mixed
     */
    public function create(array $data){
        $user = User::create(array_except($data,'role'));
        if($user) {
            $user->delete();//Soft delete the user
            if(array_key_exists('role',$data)){
            $user->assignRole(is_string($data['role'])?Hashids::decode($data['role'])[0]:$data['role']);
            }
            return $user;
        }
    }

    /**
     * Verifies and logs in an user
     * @param $hash
     * @return mixed
     */
    public function verifyAndAuth($hash){
        $user=$this->find($hash);
        $user->restore();
        if(!Auth::user()) Auth::login($user);
    }

    /**
     * Sets if an user is either approved or refused
     * @param $hash
     * @param $value
     * @return mixed
     */
    public function approve($hash,$value){
        $user=$this->find($hash);
        if($value==1){
            $user->approved=$value;
            return $user->save();
        }else{
            return $user->delete();
        }
    }
}