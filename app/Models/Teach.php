<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teach extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'level',
        'status',
        'text',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
