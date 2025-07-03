<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Perusahaan extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PerusahaanFactory> */
    use HasFactory,Notifiable;
    protected $guarded = ["id"];
    public function perusahaanProfile():HasOne{
        return $this->hasOne(Perusahaan_profile::class);
    }
    public function ajuan():HasMany{
        return $this->hasMany(Pengajuan::class,"perusahaan_id");
    }
}
