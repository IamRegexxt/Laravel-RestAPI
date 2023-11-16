<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $fillable = [
        'election_code',
        'election_description',
        'election_status',
        'users_id'
    ];
}
