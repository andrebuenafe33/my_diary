<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'author_id',
    'supervisor_id', 
    'plan_today',
    'end_today',
    'plan_tomorrow',
    'roadblocks',
    'summary',
    'status'
    ];
}
