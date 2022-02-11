<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateDatabaseFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-db-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a empty database file. You should declare the database file in the .env if you want to use sqlite';

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
     * @return int
     */
    public function handle()
    {
        $rootPath = 'database';
        $client = Storage::createLocalDriver(['root' => $rootPath]);
        $client->put('tasksdb.sqlite', '');

        return 0;
    }
}
