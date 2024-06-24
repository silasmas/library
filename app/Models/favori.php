<?php

namespace App\Models;

use App\Models\User;
use App\Models\livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class favori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function livre(){
        return $this->belongsTo(livre::class);
    }
}
