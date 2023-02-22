<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete:news {days=14}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to delete all news entries older than 14 days';

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
        $days = $this->argument('days');
        $date = \Carbon\Carbon::today()->subDays($days);
        DB::table('news')->where('created_at', '<', $date)->delete();
    }
}
