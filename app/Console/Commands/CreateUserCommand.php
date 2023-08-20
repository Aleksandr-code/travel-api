<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user['name'] = $this->ask("What's is your name?");
        $user['email'] = $this->ask("What's is your email?");
        $user['password'] = $this->secret('What is the password?');
        $roleName = $this->choice('Select your role', ['admin', 'editor'], 1);

        $role = Role::where('name', $roleName)->first();
        if (!$role){

            $this->error('Role not found!');

            return Command::FAILURE;
        }

        $validator = Validator::make($user, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Password::defaults()],
        ]);
        if ($validator->fails()){
            foreach ($validator->errors()->all() as $error){
                $this->error($error);
            }
            return Command::FAILURE;
        }

        DB::transaction(function () use ($user, $role){
            $user['password'] = Hash::make($user['password']);
            $newUser = User::create($user);
            $newUser->roles()->attach($role->id);
        });


        $this->info('User '.$user['email']. ' created successfully');

        return Command::SUCCESS;
    }
}
