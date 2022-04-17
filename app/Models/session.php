<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\formation;
use App\Models\User;

class session extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=['created_at','updated_at','date_debut','date_fin'];


    public function user(){
        return $this->belongsToMany(User::class,'session_users');
    }
    public function formation(){
        return $this->hasMany(formation::class,'session_id');
    }
}
