<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "is_super_admin"
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

    //user have relations with event (one to many)
    function event(){
        return $this->hasMany(Event::class);
    }

    // user has many attendee relationship (one to many relation ship)
    public function eventAttendee(){
        return $this->hasMany(EventAttendee::class,"user_id","id");
    }

    // user has many File relation ship (one to many relation ship)
    public function eventFile(){
        return $this->hasMany(EventFile::class);
    }

    // user has many Speaker relation ship (one to many relation ship)
    public function speaker(){
        return $this->hasMany(Speaker::class);
    }

    // user has many Sponsor relation ship (one to many relation ship)
    public function sponsor(){
        return $this->hasMany(Sponsor::class);
    }

    public function isSuperAdmin() : bool
    {
        return (bool) $this->is_super_admin;
    }


    public function createSuperAdmin(array $details) : self
    {
        $user = new self($details);

        if (! $this->superAdminExists()) {
            $user->is_super_admin = 1;
        }

        $user->save();

        return $user;
    }

    public function superAdminExists() : int
    {
        return self::where('is_super_admin', 1)->count();
    }

}
