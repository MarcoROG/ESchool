<?php namespace App\Commands;

use App\Commands\Command;
use App\Http\Requests\AddUserRequest;
use App\Services\Helper;
use Illuminate\Database\Eloquent\Collection;


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
