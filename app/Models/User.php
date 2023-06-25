<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const ADMINISTRATOR = 1;
    const VP = 2;
    const STAFF = 3;
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'group_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDepartment()
    {
        return $this->hasMany(UserDepartment::class);
    }

    public function scopeUser($query, $additionals = [])
    {
        return $query->where('id', $additionals['id']);
    }
    public function scopeList($query, $additionals = [])
    {
        $_query = $query;
        if ($additionals['group_id'] == $this::ADMINISTRATOR) {
        } else {
            $_query = $query->where('user_id', function ($where) use ($additionals) {
                $where->where('user_id', $additionals['id']);
                $where->orWhere('id', $additionals['id']);
            });
        }

        return $_query;
    }
}
