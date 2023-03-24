<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ActivateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:activate {user*} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activates users.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->option('force') || $this->confirm('Are you sure you want to run this command?', true)) {
            $pin = $this->secret("Enter your pin");
            if ($pin == '1234') {
                $this->activateUsers();
            } else {
                $this->error('Invalid pin provided');
            }
        } else {
            $this->info("Sure.. Not doing anything.");
        }
    }

    public function activateUsers()
    {
        $userIds = $this->argument('user');
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if (!is_null($user)) {
                $user->active = true;
                $user->save();
                $this->info("User $user->name activated.");
            } else {
                $this->error("User with id $userId does not exist");
            }
        }
    }
}
