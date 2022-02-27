<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_assists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_results_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('team_owner_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('player_name')->nullable();
            $table->smallinteger('goals')->nullable();
            $table->smallinteger('assists')->nullable();
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
        Schema::dropIfExists('goal_assists');
    }
}
