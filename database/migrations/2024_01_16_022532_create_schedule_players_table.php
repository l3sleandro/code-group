<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedule_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('player_id');
            $table->boolean('confirmed')->default(0);
            $table->timestamps();

            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });

        // Adiciona a trigger após a criação da tabela
        DB::unprepared('
            CREATE TRIGGER update_confirmed_count AFTER INSERT ON schedule_players
            FOR EACH ROW
            BEGIN
                UPDATE schedules
                SET confirmed = (
                    SELECT COUNT(*)
                    FROM schedule_players
                    WHERE schedule_id = NEW.schedule_id AND confirmed = 1
                )
                WHERE id = NEW.schedule_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(){

        Schema::dropIfExists('schedule_players');

        // Remove a trigger no rollback
        DB::unprepared('DROP TRIGGER IF EXISTS update_confirmed_count');
    }
};
