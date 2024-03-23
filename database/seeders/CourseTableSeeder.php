<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach( range(1,30) as $item){
            Course::create([
                'name' => 'ریاضی مهندسی',
                'price'=>  3000,
                'date'=>now()->format('Y-m-d'),
                'description' => 'جزوه کامل شامی تمام فصول ریاضی مهندسی مناسب برای کنکور ارشد',
                'content'=> 'riazi',
                'publisher_id'=> 1
            ]);
        }
    }
}
