<?php

namespace App\Jobs;

use App\Mail\TaskDueReminder;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDueTomorrowReminders implements ShouldQueue
{
    use Queueable, SerializesModels, InteractsWithQueue;

    public function handle()
    {
        $tomorrow = now()->addDay()->toDateString();

        $tasks = Task::with('user')
            ->where('due_date', $tomorrow)
            ->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)->queue(new TaskDueReminder($task));
        }
    }
}
