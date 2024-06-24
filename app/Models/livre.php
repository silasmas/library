<?php

namespace App\Models;

use App\Models\favori;
use App\Models\categorie;
use App\Models\consulter;
use App\Models\emplacement;
use App\Models\reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class livre extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories(){
        return $this->belongsToMany(categorie::class,'cotegorie_livres');
    }
    public function reserver(){
        return $this->hasMany(reservation::class);
    }
    public function favories(){
        return $this->hasMany(favori::class);
    }
    public function consulter(){
        return $this->hasMany(consulter::class);
    }
    public function emplacement(){
        return $this->belongsTo(emplacement::class);
    }
}
