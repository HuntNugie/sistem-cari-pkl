<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'otp',
        'email_verified_at',
        'google_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    public function user_profile():HasOne{
        return $this->HasOne(UserProfile::class,"user_id");
    }
    public function lamaran():HasMany{
        return $this->hasMany(Lamar::class,"user_id");
    }
    public function scopeFilter($query,$keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->where("name","LIKE","%{$keyword}%")
            ->orWhereHas("user_profile",function($query) use($keyword){
                $query->where("nis","LIKE","%{$keyword}%")
                ->orWhereHas("sekolah",function($query) use($keyword){
                    $query->where("nama_sekolah","LIKE","%{$keyword}%");
                });
            });
        });
    }
}
