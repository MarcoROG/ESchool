<?php namespace App\Commands;


use App\Repositories\Contracts\IUserRepository;
use App\Services\Helper;



class CreateUserCommand extends Command {

    public $data;
    public $users;
    /**
     * Constructs the command
     * @param $d
     * @param $u
     */
    public function __construct($d, IUserRepository $u)
	{
        $this->users=$u;
        $this->data=$d;
        $this->data['token']=Helper::generateToken();
        if(!isset($this->data['password'])){
            $this->data['password']=bcrypt(Helper::generateString());
        }
	}

}
