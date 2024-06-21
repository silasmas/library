<?php

namespace App\Models;

use App\Models\role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class roleUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function role(){
        return $this->belongsTo(role::class,'role_users');
    }
    public function user(){
        return $this->belongsTo(User::class,'role_users');
    }
}
