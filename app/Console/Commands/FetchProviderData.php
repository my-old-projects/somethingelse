<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

use App\Adapters;
use App\Adapters\BaseTaskAdapter;
use App\Models\DeveloperTask;
use App\Models\Task;

class FetchProviderData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command fetch all task data from various providers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->providers = [
            [
                'providerName' => 'Marmara',
                'baseUrl' => 'https://www.mocky.io/v2/5d47f24c330000623fa3ebfa'
            ],
            [
                'providerName' => 'Ege',
                'baseUrl' => 'https://www.mocky.io/v2/5d47f235330000623fa3ebf7'
            ]
        ];
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $baseTaskAtapdater = new BaseTaskAdapter();

        $tasks = [];

        foreach ($this->providers as $provider) {
            $providerResponse = $client->request('GET', $provider['baseUrl'])->getBody();

            $tasks = array_merge($tasks, $baseTaskAtapdater->setProvider($provider['providerName'])->getTasks(json_decode($providerResponse, true)));
        }

        DeveloperTask::truncate();
        Task::truncate();
        Task::insert($tasks);



        $this->info('Tasks imported');

        return 0;
    }
}
