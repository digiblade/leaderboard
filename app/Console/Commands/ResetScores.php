<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ResetScores extends Command
{
    protected $signature = 'scores:reset';
    protected $description = 'Reset all users\' points to 0';

    public function handle()
    {
        User::query()->update(['points' => 0]);
        $this->info('All scores have been reset.');
    }
}
