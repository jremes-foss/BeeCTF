<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\User;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This console command creates administrator user to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('*** BeeCTF Artisan Admin Creator ***');
        $this->info('[!] This command allows you to create admin user to database.');

        if($this->confirm('[?] Are you sure you wish to continue?')) {
            $name = $this->ask('[?] Enter username');
            $email = $this->ask('[?] Enter email');
            $password = $this->secret('[?] Enter password');
            $user = array(
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'user_type' => 'Administrator'
            );
            
            $validator = Validator::make([
                'email' => $email,
            ], [
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            if($validator->fails()) {
                $this->info('[!] Administrator not created. Please see error messages below: ');

                foreach($validator->errors()->all() as $error) {
                    $this->error($error);
                }

                return 1;
            } else {
                User::create($user);
                $this->info('[!] Administrative user has been created.');
            }
        }
    }
}
