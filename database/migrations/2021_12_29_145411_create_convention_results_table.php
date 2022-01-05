<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convention_results', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->foreignId('convention_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('league_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->smallinteger('game_point');
            $table->smallinteger('game_count');
            $table->smallinteger('win');
            $table->smallinteger('lose');
            $table->smallinteger('draw');
            $table->smallinteger('numbers_diff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convention_results');
    }
}
