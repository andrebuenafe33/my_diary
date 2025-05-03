<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = "examples";

    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'course',
        'contact_number'
    ];
}
