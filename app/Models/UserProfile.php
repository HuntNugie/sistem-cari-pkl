<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $guarded = ["id"];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function jurusan():BelongsTo
    {
        return $this->belongsTo(Jurusan::class, "jurusan_id");
    }
    public function sekolah():BelongsTo
    {
        return $this->belongsTo(Sekolah::class, "sekolah_id");
    }
}
