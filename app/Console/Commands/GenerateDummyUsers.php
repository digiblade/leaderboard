<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class GenerateDummyUsers extends Command
{
    // Command details
    protected $signature = 'generate:dummy-users {count=10}';
    protected $description = 'Generate dummy users using UserFactory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $count = $this->argument('count');

        // Generate the specified number of users
        User::factory()->count($count)->create();

        $this->info("{$count} dummy users have been generated successfully!");
    }
}
