<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $table = 'plat';

    protected $fillable=['nom','description','prix','image','categorie_id','user_id'];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
