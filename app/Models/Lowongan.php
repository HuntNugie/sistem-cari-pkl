<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\Perusahaan;
use App\Models\Lamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lowongan extends Model
{
    protected $guarded = ["id"];
    public function perusahaan():BelongsTo{
        return $this->belongsTo(Perusahaan::class,"perusahaan_id");
    }
    public function jurusan():BelongsTo{
        return $this->belongsTo(Jurusan::class,"jurusan_id");
    }
    public function syarat():HasMany{
        return $this->hasMany(Syarat::class,"lowongan_id");
    }
    public function lamaran():HasMany{
        return $this->hasMany(Lamar::class,"lowongan_id");
    }
    public function scopeFilter($query,$keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->where("judul_lowongan","LIKE","%".$keyword."%");
        });
    }
    public function scopeFilterjurusan($query,$keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->whereHas("jurusan",function($q) use($keyword){
                $q->where("slug",$keyword);
            });
        });
    }
}
