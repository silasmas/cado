<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\formation;
use App\Models\User;
use App\Models\favorie;

class session extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    protected $dates=['created_at','updated_at','date_debut','date_fin'];

    protected $with=['formation','favorie'];
    public function user(){
        return $this->belongsToMany(User::class,"session_users")->withPivot('etat','reference','niveau');
    }
    public function favorie(){
        return $this->hasMany(favorie::class);
    } 
    public function formateur(){
        return $this->belongsToMany(formateur::class,'formateur_sessions');
    }
    public function formation(){
        return $this->hasMany(formation::class);
    }
}
