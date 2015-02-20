<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject','message','type','sender','academic_year','section','role','person'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The type of the message
     * @access public
     * @relationship many-one
     * @return MessageType
     */
    public function type(){
        return $this->belongsTo(MessageType::class,'type');
    }
    public function sender(){
        return $this->belongsTo(User::class,'sender');
    }
}
