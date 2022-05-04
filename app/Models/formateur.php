<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\session;
class formateur extends Model
{
    use HasFactory;
    protected $guarded=[];

    // protected $with=['session'];
    public function session(){
        return $this->belongsToMany(session::class,'formateur_sessions');
    }
}
