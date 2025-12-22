<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    public $timestamps = true;
    protected $fillable=['nom','email','telephone','date','heure','nombre_personne','status'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
