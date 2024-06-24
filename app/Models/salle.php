<?php

namespace App\Models;

use App\Models\niveau;
use App\Models\compartiment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class salle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function niveau(){
        return $this->belongsTo(niveau::class);
    }
    public function compartiment(){
        return $this->hasMany(compartiment::class);
    }
}
