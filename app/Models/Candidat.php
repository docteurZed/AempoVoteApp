<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'election_id', 'poste',
        'programme', 'slogan', 'bio', 'photo', 'affiche', 'video',
        'facebook', 'twitter', 'instagram',
        'statut', 'commentaire',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Check if candidate is validated
    public function isValid(): bool
    {
        return $this->statut === 'valide';
    }
}
