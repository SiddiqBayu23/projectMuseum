<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class, 'publication_category_id');
    }
}
