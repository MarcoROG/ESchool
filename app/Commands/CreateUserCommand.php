<?php namespace App\Commands;


use App\Services\Helper;



class CreateUserCommand extends Command {

    public $data;

    /**
     * @param $d
     *
     */
    public function __construct($d)
	{
        $this->data=$d;
        $this->data['verify_token']=Helper::generateToken();
        if(!isset($this->data['password'])){
            $this->data['password']=bcrypt(Helper::generateString());
        }
	}

}
