<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'day',
        'time',
        'procedure',
        'thumbnail',
        'url'
    ];
}
