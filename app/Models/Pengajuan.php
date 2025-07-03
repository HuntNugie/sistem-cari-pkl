<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    protected $guarded = ["id"];

    public function perusahaann():BelongsTo{
        return $this->belongsTo(Perusahaan::class,"perusahaan_id");
    }
}
