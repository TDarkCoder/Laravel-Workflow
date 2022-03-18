<?php

namespace Database\Seeders;

use App\Models\PullRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PullRequestSeeder extends Seeder
{
    public function run(): void
    {
        PullRequest::factory(5)->create();
    }
}
