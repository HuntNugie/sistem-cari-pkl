<?php

namespace App\Models;

use App\Models\Lamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPenolakanPkl extends Model
{
    protected $guarded = ["id"];
    public function lamar():BelongsTo
    {
        return $this->belongsTo(Lamar::class,"lamar_id");
    }
}
