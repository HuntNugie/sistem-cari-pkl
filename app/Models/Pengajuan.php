<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    protected $guarded = ["id"];

    public function perusahaan():BelongsTo{
        return $this->belongsTo(Perusahaan::class,"perusahaan_id");
    }
}
