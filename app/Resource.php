<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model {
    use SoftDeletes

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All the messages which contain a specific resource.
     * @access public
     * @relationship many-many
     * @return Message[]
     */
    public function relatedMessages(){
        return $this->hasMany(Message::class,'messages_resources','resource','message');
    }

}
