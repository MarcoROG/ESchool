<?php namespace App\Handlers\Commands;

use App\Commands\CreateUserCommand;
use App\Entities\Users\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Facades\Mail;
use Vinkla\Hashids\Facades\Hashids;

class CreateUserCommandHandler {

	/**
	 * Handle the command.
	 *
	 * @param  CreateUserCommand  $command
	 * @return User or null
	 */
	public function handle(CreateUserCommand $command)
	{
        $user = $command->users->create($command->data);
        $mail=$user->email;
        Mail::queue('emails.registration',['hash'=>Hashids::encode($user->id)], function($message) use($mail){
            $message->from('noreply@liceotosi.va.it','Liceo Tosi');
            $message->to($mail)->subject('Attivazione');
        });
        return $user;
    }
}
