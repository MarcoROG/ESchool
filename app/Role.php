<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * All the users with a specific role.
     * @access public
     * @relationship many-many
     * @return User[]
     */
    public function usersOfRole(){
        return $this->belongsToMany(User::class,'roles_users','role','user');
    }
}
