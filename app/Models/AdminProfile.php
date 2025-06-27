<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminProfile extends Model
{
    /** @use HasFactory<\Database\Factories\AdminProfileFactory> */
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'name',
        'email',
        'phone',
        'foto',
        'nomor_pegawai',
    ];
    public function admin():BelongsTo{
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
