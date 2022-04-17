<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\formation;
class formateur extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $with=['formation'];
    public function formation(){
        return $this->belongsToMany(formation::class,'formation_formateurs');
    }
}
