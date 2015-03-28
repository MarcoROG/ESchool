<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 28/03/15
 * Time: 17:36
 */

namespace App\Presenters;


use Illuminate\Database\Eloquent\Model;

abstract class Presenter {
    private $model;

    /**
     * Instantiates a new abstract presenter saving the model it refers to
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->model=$model;
    }

    /**
     * Calls a presenter method, otherwise returns the value of the specified propriety
     * @param $attribute
     * @return mixed
     */
    function __get($attribute)
    {
        if(method_exists($this,$attribute)){
            return $this->{$attribute}();
        }
        return $this->model->{$attribute};
    }

}