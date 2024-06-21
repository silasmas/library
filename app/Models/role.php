<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsToMany(User::class,'role_users');
    }
}
