<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_number',
        'name',
        'email',
        'phone',
        'is_active',
        'level',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin() || $this->isCEI();
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            if (empty($user->student_number)) {
                // Génère un code unique de 5 lettres alphanumériques
                do {
                    $code = strtolower(Str::random(5));
                } while (self::where('student_number', $code)->exists());

                $user->student_number = $code;

                // Si le mot de passe n'est pas fourni, on le met à ce code
                if (empty($user->password)) {
                    $user->password = Hash::make($code);
                }
            }
        });
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function isCEI()
    {
        return $this->role === 'cei';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function hasVoted($electionId = null)
    {
        $query = $this->votes();

        if ($electionId) {
            $query->where('election_id', $electionId);
        }

        return $query->exists();
    }
}
