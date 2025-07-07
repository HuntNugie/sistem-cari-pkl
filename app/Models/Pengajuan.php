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
    public function scopeFilter($query,$keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->whereHas('perusahaan',function($q) use($keyword){
                $q->whereHas('perusahaanProfile',function($q) use($keyword){
                    $q->where("nama_perusahaan","LIKE","%".$keyword."%")
                    ->orWhere("nomor_izin_usaha","LIKE","%".$keyword."%")
                    ->orWhere("pemilik","LIKE","%".$keyword."%");
                });
            });
        });
    }
}
