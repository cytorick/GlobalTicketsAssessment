<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortlinkStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortlink_id',
        'ip',
        'user_agent',
    ];

    public function shortlink()
    {
        return $this->belongsTo(Shortlink::class);
    }
}
