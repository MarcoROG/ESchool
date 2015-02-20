<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'test_types';

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
     * All the tests with a specific type.
     * @access public
     * @relationship one-many
     * @return Test[]
     */
    public function testsOfType(){
        return $this->hasMany(Test::class,'type');
    }
}
