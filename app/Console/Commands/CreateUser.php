<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    public const E_OK = 0;
    public const E_USER_EXISTS = 1;

    protected $signature = 'make:user
                                {name? : User name}
                                {email? : User email}
                                {password? : User password}';

    protected $description = 'Create an admin user';

    public function handle(): int
    {
        $user = new User();
        $user->name = $this->argument('name') ?? $this->ask('User name: ');
        $user->email = $this->argument('email') ?? $this->ask('User email: ');

        $exist = User::where([
            'name' => $user->name,
            'email' => $user->email,
        ])->exists();

        if ($exist) {
            $this->error('User already exist.');

            return self::E_USER_EXISTS;
        }

        $user->password = Hash::make($this->argument('password') ?? $this->ask('User password: '));
        $user->save();
        $this->info('User created.');

        return self::E_OK;
    }
}
