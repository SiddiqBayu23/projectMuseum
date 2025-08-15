<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'no_inv',
        'collection_category_id',
        'material',
        'color',
        'length',
        'width',
        'height',
        'acquisition_method',
        'description',
        'function',
    ];

    public function category()
    {
        return $this->belongsTo(CollectionCategory::class, 'collection_category_id');
    }

    public function images()
    {
        return $this->hasMany(CollectionImage::class, 'collection_id');
    }
}
