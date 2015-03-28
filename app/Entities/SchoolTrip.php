<?php namespace App\Entities;

use App\Entities\Users\Guardian;
use Illuminate\Database\Eloquent\Model;

class SchoolTrip extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schooltrips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['destination','price','indications','start_time','end_time'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All the lessons interested by the schooltrip.
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function relatedLessons(){
        return $this->hasMany(Lesson::class,'schooltrip');
    }

    /**
     * All the authorizations received for the schooltrip.
     * @access public
     * @relationship many-many
     * @return Guardian[]
     */
    public function receivedAuthorizations(){
        return $this->belongsToMany(Guardian::class,'schooltrips_users','schooltrip','tutor');
    }
}
