<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class MessageType extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'message_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All the messages with a specific type.
     * @access public
     * @relationship one-many
     * @return Message[]
     */
    public function messagesOfType(){
        return $this->hasMany(Message::class,'type');
    }

}
