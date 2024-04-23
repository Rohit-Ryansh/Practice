<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\UserExpiryReminderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class ReminderEmailSentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // whereIn('expiry_date', [now()->addDays(30)->format('Y-m-d'), now()->addDays(60)->format('Y-m-d'), now()->addDays(90)->format('Y-m-d')])
        User::notAuthUser()
            ->get()
            ->each(function ($user) {
                $days = (int) today()->diffInDays($user->expiry_date);
                Notification::send($user, new UserExpiryReminderNotification($user, $days));
            });
    }
}
