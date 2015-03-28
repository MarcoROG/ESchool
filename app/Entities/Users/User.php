<?php namespace App\Entities\Users;


use App\Entities\Message;
use App\Presenters\Presentable;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Kodeine\Acl\Traits\HasRole;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, HasRole,SoftDeletes, Presentable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','middle_name','surname','birth_day','birth_place','catholic','gender',
		'address','email','telephone','mobile', 'password','token','approved'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Dates to be treated as a Carbon instance
     *
     * @var array
     */
    protected $dates = ['birth_day'];

    protected $presenter = \App\Presenters\Entities\User::class;

	/**
	 * All the messages sent by the user.
	 * @access public
	 * @relationship one-many
	 * @return Message[]
     */
	public function sentMessages(){
		return $this->hasMany(Message::class,'sender');
	}

    /**
     * Handles birthday setting in Carbon format
     * @param $value
     */
    public function setBirthDayAttribute($value){
        $date=explode('/',$value);
        $this->attributes['birth_day']= Carbon::createFromDate($date[2],$date[1],$date[0]);
    }

    /**
     * Approves or removes an user.
     * @param $value
     * @return bool|null
     * @throws \Exception
     */
    public function approve($value){
        if($value==1){
            $this->approved=$value;
            return $this->save();
        }else{
            return $this->delete();
        }
    }

}
