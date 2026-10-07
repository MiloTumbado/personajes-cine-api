<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDomainTables extends Migration {
 public function up(){
Schema::create('productions',function(Blueprint $table){$table->id();$table->string('name',150);$table->string('type',20);$table->string('classification',80);$table->date('release_date');$table->text('review');$table->unsignedInteger('season')->nullable();$table->timestamps();});
Schema::create('characters',function(Blueprint $table){$table->id();$table->string('name',150);$table->string('picture',2048);$table->text('description');$table->timestamps();});
Schema::create('character_production',function(Blueprint $table){$table->foreignId('character_id')->constrained()->onDelete('cascade');$table->foreignId('production_id')->constrained()->onDelete('cascade');$table->primary(['character_id','production_id']);});
}
 public function down(){Schema::dropIfExists('character_production');Schema::dropIfExists('characters');Schema::dropIfExists('productions');}
}
