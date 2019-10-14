<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pastes",function (Blueprint $table) {
            $table->string("index",8);
        });
        \App\Models\Paste::all()->each(function($p,$i){
            $p->index = \Str::random(8);
            $p->save();
        });
        Schema::table("pastes",function (Blueprint $table) {
            $table->string("index",8)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("pastes",function (Blueprint $table) {
            $table->dropColumn("index");
        });
    }
}
