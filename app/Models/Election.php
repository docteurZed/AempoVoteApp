<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Relations
    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Statuts rapides
    public function isOngoing(): bool
    {
        return $this->status === 'ongoing';
    }

    public function isUpcoming(): bool
    {
        return $this->status === 'upcoming';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}
