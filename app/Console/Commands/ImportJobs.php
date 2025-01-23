<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Job;

class ImportJobs extends Command
{
    protected $signature = 'import:jobs';

    protected $description = 'Import jobs from a JSON file';

    public function handle()
    {
        $filePath = storage_path('jobs.json');

        if (!file_exists($filePath)) {
            $this->error("The file jobs.json does not exist in the storage directory.");
            return 1;
        }

        $jobs = json_decode(file_get_contents($filePath), true);

        if (!$jobs) {
            $this->error("Invalid JSON format in jobs.json.");
            return 1;
        }
        

        foreach ($jobs as $jobData) {
            Job::create([
                'title' => $jobData['title'],
                'description' => $jobData['description'],
                'location' => $jobData['location'],
                'fee' => $jobData['fee'],
            ]);
        }

        $this->info("Jobs imported successfully!");
        return 0;
    }
}
