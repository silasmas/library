<?php

namespace App\Models;

use App\Models\niveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class imeuble extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function niveau(){
        return $this->hasMany(niveau::class);
    }
}
