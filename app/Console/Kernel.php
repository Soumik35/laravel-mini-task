protected function schedule(Schedule $schedule): void
{
    $schedule->job(new \App\Jobs\SendDueTomorrowReminders)->dailyAt('09:00');
}
