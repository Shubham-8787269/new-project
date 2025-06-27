<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteEmptyComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-empty-comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $deleted = \App\Models\Comment::whereNull('content')->orWhere('content', '')->delete();
    $this->info("Deleted $deleted empty comments.");
}
}
