<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach( range(1,15) as $item){
            Comment::create([
                'sender_id' => 2,
                'course_id'=>  2,
                'date'=>now()->format('Y-m-d'),
                'comment' => 'جزوه کامل شامی تمام فصول ریاضی مهندسی مناسب برای کنکور ارشد'
            ]);
        }
    }
}
