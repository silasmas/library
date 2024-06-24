<?php

namespace App\Models;

use App\Models\rayon;
use App\Models\salle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class compartiment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rayon(){
        return $this->hasMany(rayon::class);
    }
    public function salle(){
        return $this->belongsTo(salle::class);
    }
}
