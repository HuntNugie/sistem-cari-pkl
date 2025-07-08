<?php

namespace App\Models;

use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Syarat extends Model
{
    protected $guarded = ["id"];
    public function lowongan():BelongsTo{
        return $this->belongsTo(Lowongan::class,"lowongan_id");
    }
}
