<?php namespace App\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
		'address','email','telephone','mobile', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The roles of the user inside the system.
	 * @access public
	 * @relationship many-many
	 * @return Role[]
     */
	public function roles(){
		return $this->belongsToMany(Role::class,'roles_users','user','role');
	}

	/**
	 * All the messages sent by the user.
	 * @access public
	 * @relationship one-many
	 * @return Message[]
     */
	public function sentMessages(){
		return $this->hasMany(Message::class,'sender');
	}
}
