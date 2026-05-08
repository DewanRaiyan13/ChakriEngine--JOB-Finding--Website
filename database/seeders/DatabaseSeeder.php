<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@chakriengine.com',
        ]);

        $jobs = [
            [
                'title' => 'Senior Full Stack Laravel Developer',
                'company' => 'TechCorp Solutions',
                'location' => 'Remote / US',
                'description' => 'We are looking for an experienced Full Stack Developer proficient in Laravel and Vue.js. You will be responsible for leading a team of developers and architects to build scalable web applications.',
                'salary' => '$120k - $150k',
                'url' => '#',
                'external_id' => '1',
                'source' => 'Adzuna'
            ],
            [
                'title' => 'Frontend React Engineer',
                'company' => 'InnovateX',
                'location' => 'New York, NY',
                'description' => 'Join our fast-paced startup to build next-generation user interfaces using React, TypeScript, and Tailwind CSS. Strong eye for design is required.',
                'salary' => '$90k - $120k',
                'url' => '#',
                'external_id' => '2',
                'source' => 'LinkedIn'
            ],
            [
                'title' => 'DevOps Cloud Engineer',
                'company' => 'CloudScale',
                'location' => 'Remote',
                'description' => 'Seeking a DevOps engineer to manage our AWS infrastructure. Experience with Docker, Kubernetes, Terraform, and CI/CD pipelines (GitHub Actions) is essential.',
                'salary' => '$130k - $160k',
                'url' => '#',
                'external_id' => '3',
                'source' => 'Indeed'
            ],
            [
                'title' => 'Python Data Scientist',
                'company' => 'AI Analytics',
                'location' => 'San Francisco, CA',
                'description' => 'Work with our machine learning team to develop predictive models. Must have strong Python skills and experience with PyTorch/TensorFlow, Pandas, and scikit-learn.',
                'salary' => '$140k - $180k',
                'url' => '#',
                'external_id' => '4',
                'source' => 'Glassdoor'
            ],
            [
                'title' => 'Backend Go Developer',
                'company' => 'FinTech Systems',
                'location' => 'London, UK',
                'description' => 'Design and implement high-performance microservices for our payment gateway using Go (Golang). Background in high-concurrency systems is highly desirable.',
                'salary' => '£80k - £100k',
                'url' => '#',
                'external_id' => '5',
                'source' => 'Adzuna'
            ],
            [
                'title' => 'UI/UX Product Designer',
                'company' => 'Creative Studios',
                'location' => 'Remote / Europe',
                'description' => 'We need a creative UI/UX designer to revamp our core product. Proficient in Figma, prototyping, and user research. Provide a portfolio with your application.',
                'salary' => '€60k - €80k',
                'url' => '#',
                'external_id' => '6',
                'source' => 'Dribbble'
            ]
        ];

        foreach ($jobs as $job) {
            \App\Models\JobListing::create($job);
        }
    }
}
