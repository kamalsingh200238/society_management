<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
        ];
    }

    /**
     * Get the user's role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Check if user is Society Coordinator
     *
     * @return bool
     */
    public function isCoordinator()
    {
        return $this->role === 'society coordinator';
    }

    /**
     * Check if user is Society President
     *
     * @return bool
     */
    public function isPresident()
    {
        return $this->role === 'society president';
    }

    /**
     * Check if user is Student
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }
}
