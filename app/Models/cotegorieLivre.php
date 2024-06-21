<?php

namespace App\Models;

use App\Models\livre;
use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cotegorieLivre extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $dates=['created_at','updated_at'];
    public function livre(){
        return $this->belongsTo(livre::class,'cotegorie_livres');
    }
    public function etudiant(){
        return $this->belongsTo(categorie::class,'cotegorie_livres');
    }
}
