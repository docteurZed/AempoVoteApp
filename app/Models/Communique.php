<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communique extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($communique) {
            if (empty($user->published_at)) {
                $communique->published_at = now();
            }
        });
    }
}
