<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Organizer;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke Organizer / Kepanitiaan HIMA
     */
    public function organizer()
    {
        return $this->hasOne(Organizer::class);
    }

    /**
     * Cek apakah user ber-role organizer / kepanitiaan
     */
    public function isOrganizer()
    {
        return $this->role === 'organizer' || $this->organizer()->exists();
    }

    /**
     * Cek apakah user ber-role superadmin
     */
    public function isSuperAdmin()
    {
        return $this->role === 'admin';
    }
}
