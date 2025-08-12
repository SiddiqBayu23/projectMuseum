<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'records';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'RecordId';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'RecordCreate',
        'RecordUserid',
        'RecordStatus',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'RecordCreate' => 'string',
        'RecordUserid' => 'integer',
        'RecordStatus' => 'string',
    ];

    /**
     * Get the user that owns the record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'RecordUserid');
    }
}
