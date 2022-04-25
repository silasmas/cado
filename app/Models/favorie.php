<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\session;
class favorie extends Model
{
    use HasFactory;
    protected $guarded=[];

    // public function user(){
    //     return $this->hasMany(User::class,'session_id');
    // }
    // public function session(){
    //     return $this->hasMany(session::class,'session_id');
    // }
}
