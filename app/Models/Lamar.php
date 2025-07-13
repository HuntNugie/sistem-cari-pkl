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

    public function scopeRiwayat($query,$sekolah){
        $query->when($sekolah, function($query,$sekolah){
            $query->whereHas("siswa",function($query) use($sekolah){
                $query->whereHas("user_profile",function($query) use($sekolah){
                    $query->where("sekolah_id",$sekolah);
                });
            });
        });
    }
    public function scopeFilter($query,$keyword){
        $query->when($keyword, function($query,$keyword){
            $query->whereHas("siswa",function($query) use($keyword){
                $query->where("name","like","%{$keyword}%");
            });
        });
    }
}
