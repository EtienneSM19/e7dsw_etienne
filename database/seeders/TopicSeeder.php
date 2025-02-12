<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            'Laravel',
            'Vue',
            'React',
            'Node',
            'PHP',
            'JavaScript',
            'CSS',
            'HTML',
            'Python',
            'Ruby',
        ];
        
        Topic::insert(array_map(fn ($topic) => ['name' => $topic], $topics));
    }
}
