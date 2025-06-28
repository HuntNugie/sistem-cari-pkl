<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan_profile extends Model
{
    /** @use HasFactory<\Database\Factories\PerusahaanProfileFactory> */
    use HasFactory;
    public function perusahaan():BelongsTo{
        return $this->belongsTo(Perusahaan::class);
    }
}
