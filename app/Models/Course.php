<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'content',
        'date',
        'cover',
        'publisher_id',
    ];
<<<<<<< HEAD

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
=======
>>>>>>> 0f43e78f49bd242e550afa5f94f8cb0eb1faa992
}
