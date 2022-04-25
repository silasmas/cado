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

    protected $with=['formation'];
    public function user(){
        return $this->belongsToMany(User::class,'session_users','session_id','user_id')->withPivot('session_id','user_id','etat','reference');
    }
    public function favorie(){
        return $this->belongsToMany(User::class,'favories','session_id','user_id');
    }
    public function formation(){
        return $this->hasMany(formation::class,'session_id');
    }
}
