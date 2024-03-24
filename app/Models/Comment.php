<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
<<<<<<< HEAD
    use HasFactory;
=======
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
    protected $fillable = [
        'sender_id',
        'course_id',
        'comment',
        'date',
    ];
}
