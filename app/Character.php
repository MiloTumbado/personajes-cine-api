<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Character extends Model {
 protected $fillable = ['name','picture','description'];
 public function productions(){return $this->belongsToMany(Production::class);}
}
