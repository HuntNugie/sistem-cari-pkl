<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lowongan;
use App\Models\SuratPenolakanPkl;
use App\Models\SuratPemberitahuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    public function suratDiterima():HasOne
    {
        return $this->hasOne(SuratPemberitahuan::class,"lamar_id");
    }
    public function suratDitolak():HasOne
    {
        return $this->hasOne(SuratPenolakanPkl::class,"lamar_id");
    }
}
