<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users_Connected_To_Poker_Games', static function (Blueprint $table) {
            $table->unsignedBigInteger('poker_game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users_Connected_To_Poker_Games', function (Blueprint $table) {
            $table->dropColumn('poker_game_id');
        });
    }
};
