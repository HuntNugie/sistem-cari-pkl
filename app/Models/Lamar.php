<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lamar extends Model
{
    protected $guarded = ["id"];

    public function siswa():BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function lowongan():BelongsTo
    {
        return $this->belongsTo(Lowongan::class,"lowongan_id");
    }
}
