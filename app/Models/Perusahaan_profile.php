<?php

namespace App\Models;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan_profile extends Model
{
    /** @use HasFactory<\Database\Factories\PerusahaanProfileFactory> */
    use HasFactory;
    protected $guarded = ["id"];
    public function perusahaan():BelongsTo{
        return $this->belongsTo(Perusahaan::class);
    }
    public function scopeFilter($query, $keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->where(function($q) use($keyword){
                $q->where("nama_perusahaan","LIKE","%".$keyword."%")
                ->orWhere("nomor_izin_usaha","LIKE","%".$keyword."%")
                ->orWhere("pemilik","LIKE","%".$keyword."%");
            });
        })  ;
    }
}
