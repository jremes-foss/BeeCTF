<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
        $this->info('');
        $this->info('[!] This command allows you to create admin user to database.');

        if($this->confirm('Are you sure you wish to continue?')) {
            $name = $this->ask('Enter username: ');
            $email = $this->ask('Enter email: ');
            $password = $this->secret('Enter password: ');
            $user = array(
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'user_type' => 'Administrator'
            );
        }
    }
}
