<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categorie extends Model
{
    protected $table = 'categorie';
    protected $fillable=['nom','slug'];
    public function plats(){
        return $this->hasMany(Plat::class);
    }
     protected static function boot()
    {
        parent::boot();

        static::creating(function ($categorie) {
            $categorie->slug = Str::slug($categorie->nom);
        });
        static::updating(function ($categorie) {
            $categorie->slug = Str::slug($categorie->nom);
        });
    }

}
