<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecRow extends Model
{
    use HasFactory;
    //
    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }
}
