<?php

namespace App\Models;
use App\Models\User;
use App\Models\session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionUser extends Model
{
    use HasFactory;
      
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function session(){
        return $this->belongsTo(session::class);
    }
}
