<?php namespace App\Users;

use App\Message;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Lang;
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
        $this->attributes['birth_day']= Carbon::parse($value);
    }

    /**
     * Returns the full name of the user
     * @return string
     */
    public function fullName(){
        $full=$this->name. ' ';
        if($this->middle_name)$full.=$this->middle_name . ' ';
        $full.=$this->surname;
        return $full;
    }

    /**
     * Returns the day in which the user was born
     * @return Carbon
     */
    public function getBirthday(){
        
        return $this->birth_day->format('d/m/Y');
    }

    /**
     * Returns the birthday of the user
     * @return string
     */
    public function getRecurrentBirthday(){
        return $this->birth_day->day.' '
        .strtolower(Lang::get('dates.month.'.$this->birth_day->month));
    }

}
