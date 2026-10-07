<?php
namespace App\Http\Controllers\Api;
use App\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class CharacterController extends Controller {
 public function index(){return response()->json(Character::with('productions')->orderBy('name')->get());}
 public function show(Character $character){return response()->json($character->load('productions'));}
 private function validated(Request $r){return $r->validate(['name'=>'required|string|max:150','picture'=>'required|url|max:2048','description'=>'required|string|max:20000','production_ids'=>'required|array|min:1','production_ids.*'=>'required|integer|distinct|exists:productions,id']);}
 public function store(Request $r){$d=$this->validated($r);$c=DB::transaction(function()use($d){$c=Character::create(collect($d)->except('production_ids')->all());$c->productions()->sync($d['production_ids']);return $c;});return response()->json($c->load('productions'),201);}
 public function update(Request $r,Character $character){$d=$this->validated($r);DB::transaction(function()use($d,$character){$character->update(collect($d)->except('production_ids')->all());$character->productions()->sync($d['production_ids']);});return response()->json($character->load('productions'));}
 public function destroy(Character $character){$character->delete();return response()->json(null,204);}
}
