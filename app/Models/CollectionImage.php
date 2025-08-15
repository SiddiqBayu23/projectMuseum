<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'image'
    ];

    public function collections()
    {
        return $this->hasMany(Collection::class, 'collection_category_id');
    }
}
