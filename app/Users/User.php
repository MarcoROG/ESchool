<?php namespace App;

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
	protected $fillable = ['name','middle_name','surname','birth_day','birth_place','catholic',
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
	 * @return Role[]
     */
	public function roles(){
		$this->hasMany('Role','role','user');
	}

	/**
	 * All the messages sent by the user.
	 * @access public
	 * @return Message[]
     */
	public function sentMessages(){
		$this->hasMany('Message',null,'sender');
	}
}
