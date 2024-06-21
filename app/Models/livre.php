<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class livre extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories(){
        return $this->belongsToMany(categorie::class,'cotegorie_livres');
    }
}
