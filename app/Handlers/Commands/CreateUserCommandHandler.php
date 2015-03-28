<?php namespace App\Handlers\Commands;

use App\Commands\CreateUserCommand;
use App\Entities\Users\User;
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
        $user = User::create(array_except($command->data,'role'));
        if($user) {
            $user->delete();//Soft delete the user
            $user->assignRole(Hashids::decode($command->data['role'])[0]);
            $mail=$user->email;
            Mail::queue('emails.registration',['hash'=>Hashids::encode($user->id)], function($message) use($mail){
                $message->from('noreply@liceotosi.va.it','Liceo Tosi');
                $message->to($mail)->subject('Attivazione');
            });
            return $user;
        }

        return false;
	}
}
