<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavbarLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'navbar_section_id',
        'navigation',
        'href',
    ];


    public function section()
    {
        return $this->belongsTo(NavbarSection::class, 'navbar_section_id');
    }
}
