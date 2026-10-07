<?php
namespace App\Http\Controllers\Api;
use App\Production;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
class ProductionController extends Controller {
 public function index(){return response()->json(Production::with('characters')->orderBy('name')->get());}
 public function show(Production $production){return response()->json($production->load('characters'));}
 private function validated(Request $r){$data=$r->validate(['name'=>'required|string|max:150','type'=>['required',Rule::in(['movie','series'])],'classification'=>'required|string|max:80','release_date'=>'required|date_format:Y-m-d','review'=>'required|string|max:20000','season'=>'nullable|required_if:type,series|integer|min:1|max:200']);if($data['type']==='movie')$data['season']=null;return $data;}
 public function store(Request $r){return response()->json(Production::create($this->validated($r))->load('characters'),201);}
 public function update(Request $r,Production $production){$production->update($this->validated($r));return response()->json($production->load('characters'));}
 public function destroy(Production $production){$production->delete();return response()->json(null,204);}
}
