<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\session; 
use App\Models\formateur; 
class formateurSession extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $dates=['created_at','updated_at'];
    public function formateur(){
        return $this->belongsTo(formateur::class,'formateur_sessions');
    }
    public function session(){
        return $this->belongsTo(session::class,'formateur_sessions');
    }
}
