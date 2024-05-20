<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'destination',
        'title',
        'expires_at',
        'is_disabled',
        'is_custom',
        'user_id'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_disabled' => 'boolean',
        'is_custom' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statistics()
    {
        return $this->hasMany(ShortlinkStatistic::class);
    }
}
