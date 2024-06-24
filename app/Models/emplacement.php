<?php

namespace App\Models;

use App\Models\livre;
use App\Models\rayon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class emplacement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function livre(){
        return $this->hasMany(livre::class);
    }
    public function rayon(){
        return $this->belongs(rayon::class);
    }
}
