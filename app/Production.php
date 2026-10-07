<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Production extends Model {
 protected $fillable = ['name','type','classification','release_date','review','season'];
 protected $casts=['season'=>'integer'];public function characters(){return $this->belongsToMany(Character::class);}
}
