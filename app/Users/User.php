<?php namespace App\Users;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kodeine\Acl\Traits\HasRole;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, HasRole,SoftDeletes;

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
		'address','email','telephone','mobile', 'password','verify_token','verified'];

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
    protected $dates = array('birth_day');

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
        $this->attributes['birth_day']= Carbon::createFromFormat('d/m/Y',$value);
    }
}
