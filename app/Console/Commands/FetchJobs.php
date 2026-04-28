<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AdzunaService;
use App\Models\JobListing;

class FetchJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch jobs from Adzuna API and store them in the database';

    /**
     * Execute the console command.
     */
    public function handle(AdzunaService $adzunaService)
    {
        $this->info('Fetching jobs from Adzuna...');

        $jobs = $adzunaService->fetchJobs('developer');

        $count = 0;
        foreach ($jobs as $job) {
            JobListing::updateOrCreate(
                [
                    'external_id' => $job['id'],
                    'source' => 'adzuna'
                ],
                [
                    'title' => $job['title'] ?? 'Unknown Title',
                    'company' => $job['company']['display_name'] ?? 'Unknown Company',
                    'location' => $job['location']['display_name'] ?? 'Unknown Location',
                    'description' => $job['description'] ?? '',
                    'salary' => isset($job['salary_min']) && isset($job['salary_max']) ? "{$job['salary_min']} - {$job['salary_max']}" : null,
                    'url' => $job['redirect_url'] ?? '',
                ]
            );
            $count++;
        }

        $this->info("Successfully fetched and processed {$count} jobs.");
    }
}
