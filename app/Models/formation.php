<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\session;
use App\Models\formateur;

class formation extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $with=['session'];
   
    public function session(){
        return $this->belongsTo(session::class);
    }
  
}
