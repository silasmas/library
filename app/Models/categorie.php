<?php

namespace App\Models;

use App\Models\livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function livre(){
        return $this->belongsToMany(livre::class,'cotegorie_livres');
    }
}
