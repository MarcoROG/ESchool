<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 28/03/15
 * Time: 17:28
 */

namespace App\Presenters;


trait Presentable {

    /**
     * View presenter istance
     * @var
     */
    protected $presenterInstance = null;


    /**
     * Returns the instance of the presenter, eventually instantiating a new one
     * @throws PresenterException
     * @return Presenter
     */
    function present(){
        if (!$this->presenter && !class_exists($this->presenter)){
            //TODO implement error
        }
        if(!$this->presenterInstance){
            $this->presenterInstance= new $this->presenter($this);
        }
        return $this->presenterInstance;
    }
}