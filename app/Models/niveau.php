<?php

namespace App\Models;

use App\Models\imeuble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class niveau extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function salle(){
        return $this->hasMany(salle::class);
    }
    public function imeuble(){
        return $this->belongsTo(imeuble::class);
    }
}
