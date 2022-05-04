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
    //protected $with=['user','session'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function session(){
        return $this->belongsTo(session::class);
    }
}
