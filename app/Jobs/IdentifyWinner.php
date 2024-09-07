<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Winner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IdentifyWinner implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $topUsers = User::orderBy('points', 'desc')->take(2)->get();

        if ($topUsers->count() === 1 || $topUsers[0]->points > $topUsers[1]->points) {
            $winner = $topUsers[0];

            Winner::create([
                'user_id' => $winner->id,
                'points' => $winner->points,
                'timestamp' => now()
            ]);
        }
    }
}

