<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    use Notifiable;
    protected $guarded = ["id"];
    public function profile()
    {
        return $this->hasOne(AdminProfile::class, 'admin_id');
    }
    public function scopeFilter($query,$keyword){
        return $query->when($keyword,function($query,$keyword){
            $query->whereHas("profile",function($q) use ($keyword){
                $q->where("name","LIKE","%".$keyword."%")
                ->orWhere("email","LIKE","%".$keyword."%")
                ->orWhere("nomor_pegawai","LIKE","%".$keyword."%");
            });
        });
    }
}
