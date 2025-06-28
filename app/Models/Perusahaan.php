<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Perusahaan extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PerusahaanFactory> */
    use HasFactory,Notifiable;
}
