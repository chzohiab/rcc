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
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained();
            // $table->bigInteger(column: 'tracking_no');
            $table->string(column: 'name');
            $table->text(column: 'bio');
            $table->string(column: 'city');
            $table->unsignedInteger(column: 'established_year');
            $table->string(column: 'image');
            $table->timestamps();
        });

        Schema::table('clubs', function (Blueprint $table) {
            $table->unique('club_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
};
