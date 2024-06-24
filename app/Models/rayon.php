<?php

namespace App\Models;

use App\Models\emplacement;
use App\Models\compartiment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rayon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function compartiment(){
        return $this->belongsTo(compartiment::class);
    }

    public function emplacement(){
        return $this->hasMany(emplacement::class);
    }
}
